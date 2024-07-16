<?php

declare(strict_types=1);

namespace Infrastructute\Decorator;

use Application\Dto\DataProviderRequestDto;
use Domain\Decorator\DataProviderInterface;
use Domain\Provider\DataProvider;

abstract class AbstractDataProviderDecorator implements DataProviderInterface
{
    public function __construct(protected DataProvider $dataProvider)
    {
    }

    /**
     * @inheritDoc
     */
    public function get(DataProviderRequestDto $request): array
    {
        return $this->dataProvider->get();
    }
}