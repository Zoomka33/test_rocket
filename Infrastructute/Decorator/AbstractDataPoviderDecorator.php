<?php

declare(strict_types=1);

namespace Infrastructute\Decorator;

use DataProviderRequestDto;
use Domain\Decorator\DataProviderInterface;
use Domain\Provider\DataProvider;

abstract class AbstractDataPoviderDecorator implements DataProviderInterface
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