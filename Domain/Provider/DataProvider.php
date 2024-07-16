<?php

declare(strict_types=1);

namespace Domain\Provider;

use Application\Dto\DataProviderRequestDto;
use Domain\Decorator\DataProviderInterface;

class DataProvider implements DataProviderInterface
{

    public function __construct(
        public string $host,
        public string $user,
        public string $password,
    )
    {
    }

    public function get(DataProviderRequestDto $request): array
    {
        // TODO: Implement get() method.
    }
}