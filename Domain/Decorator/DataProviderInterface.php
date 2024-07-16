<?php

declare(strict_types=1);

namespace Domain\Decorator;

use Application\Dto\DataProviderRequestDto;

interface DataProviderInterface
{

    /**
     * Что то возвращает
     *
     * @param DataProviderRequestDto $request
     * @return array
     */
    public function get(DataProviderRequestDto $request): array;

}