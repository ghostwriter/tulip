<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Console\Command\Hotfix;

use Ghostwriter\Tulip\EventDispatcher\Event\HotfixFinishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\HotfixFinishEvent;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

use function str_repeat;

/**
 * @see HotfixFinishCommandTest
 */
#[AsCommand(name: 'hotfix:finish', description: 'Finish a hotfix branch')]
final class HotfixFinishCommand extends AbstractHotfixCommand
{
    /** @throws Throwable */
    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([$this->getName(), str_repeat('=', 12), $this->getDescription()]);

        $this->eventDispatcher->dispatch(new HotfixFinishEvent($version));
        $this->eventDispatcher->dispatch(new HotfixFinishedEvent($version));

        return self::SUCCESS;
    }
}
