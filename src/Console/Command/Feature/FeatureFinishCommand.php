<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Console\Command\Feature;

use Ghostwriter\Tulip\Console\Command\Feature\AbstractFeatureCommand;
use Ghostwriter\Tulip\EventDispatcher\Event\FeatureFinishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\FeatureFinishEvent;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

use function str_repeat;

/**
 * @see FeatureFinishCommandTest
 */
#[AsCommand(name: 'feature:finish', description: 'Finish a feature branch')]
final class FeatureFinishCommand extends AbstractFeatureCommand
{
    /** @throws Throwable */
    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([$this->getName(), str_repeat('=', 12), $this->getDescription()]);

        $this->eventDispatcher->dispatch(new FeatureFinishEvent($version));
        $this->eventDispatcher->dispatch(new FeatureFinishedEvent($version));

        return self::SUCCESS;
    }
}
