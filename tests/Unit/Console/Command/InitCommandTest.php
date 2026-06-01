<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Command;

use Ghostwriter\Tulip\Console\Command\AbstractCommand;
use Ghostwriter\Tulip\Console\Command\InitCommand;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\SignalableCommandInterface;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(InitCommand::class)]
final class InitCommandTest extends AbstractTestCase
{
    public function testExtendsGhostwriterTulipConsoleCommandAbstractCommand(): void
    {
        self::assertTrue(is_a(InitCommand::class, AbstractCommand::class, true));
    }

    public function testExtendsSymfonyComponentConsoleCommandCommand(): void
    {
        self::assertTrue(is_a(InitCommand::class, Command::class, true));
    }

    public function testImplementsSymfonyComponentConsoleCommandSignalableCommandInterface(): void
    {
        self::assertTrue(is_a(InitCommand::class, SignalableCommandInterface::class, true));
    }
}
