<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Console\Command\Bugfix;

use Ghostwriter\Tulip\Console\Command\Bugfix\AbstractBugfixCommand;
use Ghostwriter\Tulip\EventDispatcher\Event\BugfixFinishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\BugfixFinishEvent;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

use function str_repeat;

/**
 * @see BugfixFinishCommandTest
 */
#[AsCommand(name: 'bugfix:finish', description: 'Finish a bugfix branch')]
final class BugfixFinishCommand extends AbstractBugfixCommand
{
    /** @throws Throwable */
    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([$this->getName(), str_repeat('=', 12), $this->getDescription()]);

        $this->eventDispatcher->dispatch(new BugfixFinishEvent($version));
        $this->eventDispatcher->dispatch(new BugfixFinishedEvent($version));

        return self::SUCCESS;
    }
}
