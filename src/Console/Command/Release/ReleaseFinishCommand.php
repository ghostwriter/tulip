<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Console\Command\Release;

use Ghostwriter\Tulip\EventDispatcher\Event\ReleaseFinishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\ReleaseFinishEvent;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

use function str_repeat;

/**
 * @see ReleaseFinishCommandTest
 */
#[AsCommand(name: 'release:finish', description: 'Finish a release branch')]
final class ReleaseFinishCommand extends AbstractReleaseCommand
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

        $this->eventDispatcher->dispatch(new ReleaseFinishEvent($version));
        $this->eventDispatcher->dispatch(new ReleaseFinishedEvent($version));
        // $this->git('flow', 'release', 'finish', $version);

        return self::SUCCESS;
    }
}
