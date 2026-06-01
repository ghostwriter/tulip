<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Command\Bugfix;

use Ghostwriter\Tulip\Console\Command\AbstractCommand;
use Ghostwriter\Tulip\Console\Command\Bugfix\AbstractBugfixCommand;
use Ghostwriter\Tulip\Console\Command\Bugfix\BugfixStartCommand;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\SignalableCommandInterface;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(BugfixStartCommand::class)]
final class BugfixStartCommandTest extends AbstractTestCase
{
    public function testExtendsGhostwriterTulipConsoleCommandAbstractCommand(): void
    {
        self::assertTrue(is_a(BugfixStartCommand::class, AbstractCommand::class, true));
    }

    public function testExtendsGhostwriterTulipConsoleCommandBugfixAbstractBugfixCommand(): void
    {
        self::assertTrue(is_a(BugfixStartCommand::class, AbstractBugfixCommand::class, true));
    }

    public function testExtendsSymfonyComponentConsoleCommandCommand(): void
    {
        self::assertTrue(is_a(BugfixStartCommand::class, Command::class, true));
    }

    public function testImplementsSymfonyComponentConsoleCommandSignalableCommandInterface(): void
    {
        self::assertTrue(is_a(BugfixStartCommand::class, SignalableCommandInterface::class, true));
    }
}
