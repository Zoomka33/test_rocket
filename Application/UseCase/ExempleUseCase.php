<?php

declare(strict_types=1);

namespace Application\UseCase;

use Application\Dto\DataProviderRequestDto;
use Domain\Provider\DataProvider;
use Infrastructute\Decorator\DecoratorManager;

class ExempleUseCase
{

    public function getSomeData()
    {
        $dataProvider = new DataProvider(
            host: 'host',
            user: 'user',
            password: 'password'
        );

        $dataProvider = (new DecoratorManager($dataProvider))
            ->setCache()
            ->setLogget();

        $result = $dataProvider->get(new DataProviderRequestDto());
    }
}