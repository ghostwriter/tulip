<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Console\Command\Release;

use Ghostwriter\Tulip\EventDispatcher\Event\ReleaseStartedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\ReleaseStartEvent;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

use function str_repeat;

/**
 * @see ReleaseStartCommandTest
 */
#[AsCommand(name: 'release:start', description: 'Start a release branch')]
final class ReleaseStartCommand extends AbstractReleaseCommand
{
    /** @throws Throwable */
    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([$this->getName(), str_repeat('=', 12), $this->getDescription()]);
        $version = $input->getArgument('version');

        if (empty($version)) {
            $this->style->error('Version is required.');

            return self::FAILURE;
        }

        // $this->git('flow', 'release', 'start', $version);
        $this->eventDispatcher->dispatch(new ReleaseStartEvent($version));
        $this->eventDispatcher->dispatch(new ReleaseStartedEvent($version));

        return self::SUCCESS;
    }
}
