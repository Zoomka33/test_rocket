<?php

declare(strict_types=1);

namespace Infrastructute\Decorator;

use DataProviderRequestDto;
use Domain\Provider\DataProvider;
use Infrastructute\Cache\CacheItemPoolInterface;

class DecoratorManager extends AbstractDataPoviderDecorator
{
    public CacheItemPoolInterface $cache;
    public LoggerInterface $logger;

    public function setLogget(LoggerInterface $logger): static
    {
        $this->logger = $logger;
        return $this;
    }

    public function setCache(CacheItemPoolInterface $cacheItemPool): static
    {
        $this->cache = $cacheItemPool;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function get(DataProviderRequestDto $request): array
    {
        try {
            $cacheKey = $this->cache->getCacheKey($input);
            $cacheItem = $this->cache->getItem($cacheKey);
            if ($cacheItem->isHit()) {
                return $cacheItem->get();
            }

            $result = parent::get($input);

            $cacheItem
                ->set($result)
                ->expiresAt(
                    (new DateTime())->modify('+1 day')
                );

            return $result;
        } catch (Exception $e) {
            $this->logger->critical('Error');
        }

        return [];
    }


}