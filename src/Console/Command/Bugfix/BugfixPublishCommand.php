<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Console\Command\Bugfix;

use Ghostwriter\Tulip\Console\Command\Bugfix\AbstractBugfixCommand;
use Ghostwriter\Tulip\EventDispatcher\Event\BugfixPublishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\BugfixPublishEvent;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

use function str_repeat;

/**
 * @see BugfixPublishCommandTest
 */
#[AsCommand(name: 'bugfix:publish', description: 'Publish a bugfix branch')]
final class BugfixPublishCommand extends AbstractBugfixCommand
{
    /** @throws Throwable */
    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([$this->getName(), str_repeat('=', 12), $this->getDescription()]);

        $this->eventDispatcher->dispatch(new BugfixPublishEvent($version));
        $this->eventDispatcher->dispatch(new BugfixPublishedEvent($version));

        return self::SUCCESS;
    }
}
