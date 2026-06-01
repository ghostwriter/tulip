<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Command\Feature;

use Ghostwriter\Tulip\Console\Command\AbstractCommand;
use Ghostwriter\Tulip\Console\Command\Feature\AbstractFeatureCommand;
use Ghostwriter\Tulip\Console\Command\Feature\FeatureStartCommand;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\SignalableCommandInterface;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(FeatureStartCommand::class)]
final class FeatureStartCommandTest extends AbstractTestCase
{
    public function testExtendsGhostwriterTulipConsoleCommandAbstractCommand(): void
    {
        self::assertTrue(is_a(FeatureStartCommand::class, AbstractCommand::class, true));
    }

    public function testExtendsGhostwriterTulipConsoleCommandFeatureAbstractFeatureCommand(): void
    {
        self::assertTrue(is_a(FeatureStartCommand::class, AbstractFeatureCommand::class, true));
    }

    public function testExtendsSymfonyComponentConsoleCommandCommand(): void
    {
        self::assertTrue(is_a(FeatureStartCommand::class, Command::class, true));
    }

    public function testImplementsSymfonyComponentConsoleCommandSignalableCommandInterface(): void
    {
        self::assertTrue(is_a(FeatureStartCommand::class, SignalableCommandInterface::class, true));
    }
}
