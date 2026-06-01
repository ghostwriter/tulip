<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Console\Command\Hotfix;

use Ghostwriter\Tulip\EventDispatcher\Event\HotfixStartedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\HotfixStartEvent;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

use function str_repeat;

/**
 * @see HotfixStartCommandTest
 */
#[AsCommand(name: 'hotfix:start', description: 'Start a hotfix branch')]
final class HotfixStartCommand extends AbstractHotfixCommand
{
    /** @throws Throwable */
    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([$this->getName(), str_repeat('=', 12), $this->getDescription()]);

        $this->eventDispatcher->dispatch(new HotfixStartEvent($version));
        $this->eventDispatcher->dispatch(new HotfixStartedEvent($version));

        return self::SUCCESS;
    }
}
