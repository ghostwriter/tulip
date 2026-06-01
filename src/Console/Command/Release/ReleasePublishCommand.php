<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Console\Command\Release;

use Ghostwriter\Tulip\EventDispatcher\Event\ReleasePublishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\ReleasePublishEvent;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

use function str_repeat;

/**
 * @see ReleasePublishCommandTest
 */
#[AsCommand(name: 'release:publish', description: 'Publish a release branch')]
final class ReleasePublishCommand extends AbstractReleaseCommand
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

        // $this->git('flow', 'release', 'publish', $version);
        $this->eventDispatcher->dispatch(new ReleasePublishEvent($version));
        $this->eventDispatcher->dispatch(new ReleasePublishedEvent($version));

        return self::SUCCESS;
    }
}
