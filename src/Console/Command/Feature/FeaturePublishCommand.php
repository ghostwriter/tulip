<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Console\Command\Feature;

use Ghostwriter\Tulip\EventDispatcher\Event\FeaturePublishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\FeaturePublishEvent;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

use function str_repeat;

/**
 * @see FeaturePublishCommandTest
 */
#[AsCommand(name: 'feature:publish', description: 'Publish a feature branch')]
final class FeaturePublishCommand extends AbstractFeatureCommand
{
    /** @throws Throwable */
    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([$this->getName(), str_repeat('=', 12), $this->getDescription()]);

        $this->eventDispatcher->dispatch(new FeaturePublishEvent($version));
        $this->eventDispatcher->dispatch(new FeaturePublishedEvent($version));

        return self::SUCCESS;
    }
}
