<?php

declare(strict_types=1);

namespace Infrastructute\Logger;

interface LoggerInterface
{

    public function getCacheKey(array $input): string;
}