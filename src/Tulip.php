<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip;

use Ghostwriter\Container\Container;
use Ghostwriter\Tulip\Interface\TulipInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Throwable;

/** @see TulipTest */
final readonly class Tulip implements TulipInterface
{
    public function __construct(
        private Application $application,
    ) {}

    public static function new(): self
    {
        return Container::getInstance()->get(self::class);
    }

    /** @throws Throwable */
    public function run(array $arguments = []): int
    {
        return $this->application->run(new ArgvInput($arguments));
    }
}
