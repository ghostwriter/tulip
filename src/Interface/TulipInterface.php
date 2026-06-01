<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Interface;

use Throwable;

interface TulipInterface
{
    /** @throws Throwable */
    public function run(array $arguments = []): int;
}
