<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Console\Command\Hotfix;

use Ghostwriter\Tulip\EventDispatcher\Event\HotfixPublishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\HotfixPublishEvent;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

use function str_repeat;

/**
 * @see HotfixPublishCommandTest
 */
#[AsCommand(name: 'hotfix:publish', description: 'Publish a hotfix branch')]
final class HotfixPublishCommand extends AbstractHotfixCommand
{
    /** @throws Throwable */
    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([$this->getName(), str_repeat('=', 12), $this->getDescription()]);

        $this->eventDispatcher->dispatch(new HotfixPublishEvent($version));
        $this->eventDispatcher->dispatch(new HotfixPublishedEvent($version));

        return self::SUCCESS;
    }
}
