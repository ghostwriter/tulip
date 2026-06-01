<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Command\Hotfix;

use Ghostwriter\Tulip\Console\Command\AbstractCommand;
use Ghostwriter\Tulip\Console\Command\Hotfix\AbstractHotfixCommand;
use Ghostwriter\Tulip\Console\Command\Hotfix\HotfixStartCommand;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\SignalableCommandInterface;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(HotfixStartCommand::class)]
final class HotfixStartCommandTest extends AbstractTestCase
{
    public function testExtendsGhostwriterTulipConsoleCommandAbstractCommand(): void
    {
        self::assertTrue(is_a(HotfixStartCommand::class, AbstractCommand::class, true));
    }

    public function testExtendsGhostwriterTulipConsoleCommandHotfixAbstractHotfixCommand(): void
    {
        self::assertTrue(is_a(HotfixStartCommand::class, AbstractHotfixCommand::class, true));
    }

    public function testExtendsSymfonyComponentConsoleCommandCommand(): void
    {
        self::assertTrue(is_a(HotfixStartCommand::class, Command::class, true));
    }

    public function testImplementsSymfonyComponentConsoleCommandSignalableCommandInterface(): void
    {
        self::assertTrue(is_a(HotfixStartCommand::class, SignalableCommandInterface::class, true));
    }
}
