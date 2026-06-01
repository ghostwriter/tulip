<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Command\Feature;

use Ghostwriter\Tulip\Console\Command\AbstractCommand;
use Ghostwriter\Tulip\Console\Command\Feature\AbstractFeatureCommand;
use Ghostwriter\Tulip\Console\Command\Feature\FeatureFinishCommand;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\SignalableCommandInterface;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(FeatureFinishCommand::class)]
final class FeatureFinishCommandTest extends AbstractTestCase
{
    public function testExtendsGhostwriterTulipConsoleCommandAbstractCommand(): void
    {
        self::assertTrue(is_a(FeatureFinishCommand::class, AbstractCommand::class, true));
    }

    public function testExtendsGhostwriterTulipConsoleCommandFeatureAbstractFeatureCommand(): void
    {
        self::assertTrue(is_a(FeatureFinishCommand::class, AbstractFeatureCommand::class, true));
    }

    public function testExtendsSymfonyComponentConsoleCommandCommand(): void
    {
        self::assertTrue(is_a(FeatureFinishCommand::class, Command::class, true));
    }

    public function testImplementsSymfonyComponentConsoleCommandSignalableCommandInterface(): void
    {
        self::assertTrue(is_a(FeatureFinishCommand::class, SignalableCommandInterface::class, true));
    }
}
