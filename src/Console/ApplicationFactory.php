<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Console;

use Composer\InstalledVersions;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\Tulip\Configuration\WipConfiguration;
use Override;
use Psr\Container\ContainerInterface as PsrContainerInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\CommandLoader\ContainerCommandLoader;
use Throwable;

/**
 * @see ApplicationFactoryTest
 *
 * @implements FactoryInterface<Application>
 */
final readonly class ApplicationFactory implements FactoryInterface
{
    public const array COMMANDS = [];

    /** @throws Throwable */
    #[Override]
    public function __invoke(ContainerInterface $container): Application
    {
        $application = new Application(
            'Tulip🌷',
            InstalledVersions::getPrettyVersion('ghostwriter/tulip')
        );

        $application->setAutoExit(false);

        $application->setCatchErrors(false);

        $application->setCatchExceptions(false);

        $application->setCommandLoader(new ContainerCommandLoader(
            $container->get(PsrContainerInterface::class),
            self::COMMANDS
        ));

        return $application;
    }
}
