<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Console;

use Composer\InstalledVersions;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\Tulip\Console\Command\Bugfix\BugfixFinishCommand;
use Ghostwriter\Tulip\Console\Command\Bugfix\BugfixPublishCommand;
use Ghostwriter\Tulip\Console\Command\Bugfix\BugfixStartCommand;
use Ghostwriter\Tulip\Console\Command\Feature\FeatureFinishCommand;
use Ghostwriter\Tulip\Console\Command\Feature\FeaturePublishCommand;
use Ghostwriter\Tulip\Console\Command\Feature\FeatureStartCommand;
use Ghostwriter\Tulip\Console\Command\Hotfix\HotfixFinishCommand;
use Ghostwriter\Tulip\Console\Command\Hotfix\HotfixPublishCommand;
use Ghostwriter\Tulip\Console\Command\Hotfix\HotfixStartCommand;
use Ghostwriter\Tulip\Console\Command\InitCommand;
use Ghostwriter\Tulip\Console\Command\Release\ReleaseFinishCommand;
use Ghostwriter\Tulip\Console\Command\Release\ReleasePublishCommand;
use Ghostwriter\Tulip\Console\Command\Release\ReleaseStartCommand;
use Override;
use Psr\Container\ContainerInterface as PsrContainerInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\CommandLoader\ContainerCommandLoader;
use Tests\Unit\Console\ApplicationFactoryTest;
use Throwable;

use function sprintf;

/**
 * @see ApplicationFactoryTest
 *
 * @implements FactoryInterface<Application>
 */
final readonly class ApplicationFactory implements FactoryInterface
{
    public const string AUTHOR = 'Nathanael Esayeas';

    public const array COMMANDS = [
        'bugfix:finish' => BugfixFinishCommand::class,
        'bugfix:publish' => BugfixPublishCommand::class,
        'bugfix:start' => BugfixStartCommand::class,
        'feature:finish' => FeatureFinishCommand::class,
        'feature:publish' => FeaturePublishCommand::class,
        'feature:start' => FeatureStartCommand::class,
        'hotfix:finish' => HotfixFinishCommand::class,
        'hotfix:publish' => HotfixPublishCommand::class,
        'hotfix:start' => HotfixStartCommand::class,
        // 'init' => InitCommand::class,
        'release:finish' => ReleaseFinishCommand::class,
        'release:publish' => ReleasePublishCommand::class,
        'release:start' => ReleaseStartCommand::class,
    ];

    public const string NAME = 'Tulip🌷';

    public const string PACKAGE = 'ghostwriter/tulip';

    /** @throws Throwable */
    #[Override]
    public function __invoke(ContainerInterface $container): Application
    {
        $application = new Application(
            sprintf('%s by %s and contributors.', self::NAME, self::AUTHOR),
            InstalledVersions::getPrettyVersion(self::PACKAGE),
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
