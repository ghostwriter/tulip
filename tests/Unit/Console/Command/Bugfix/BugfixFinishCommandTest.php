<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Command\Bugfix;

use Ghostwriter\Tulip\Console\Command\AbstractCommand;
use Ghostwriter\Tulip\Console\Command\Bugfix\AbstractBugfixCommand;
use Ghostwriter\Tulip\Console\Command\Bugfix\BugfixFinishCommand;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\SignalableCommandInterface;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(BugfixFinishCommand::class)]
final class BugfixFinishCommandTest extends AbstractTestCase
{
    public function testExtendsGhostwriterTulipConsoleCommandAbstractCommand(): void
    {
        self::assertTrue(is_a(BugfixFinishCommand::class, AbstractCommand::class, true));
    }

    public function testExtendsGhostwriterTulipConsoleCommandBugfixAbstractBugfixCommand(): void
    {
        self::assertTrue(is_a(BugfixFinishCommand::class, AbstractBugfixCommand::class, true));
    }

    public function testExtendsSymfonyComponentConsoleCommandCommand(): void
    {
        self::assertTrue(is_a(BugfixFinishCommand::class, Command::class, true));
    }

    public function testImplementsSymfonyComponentConsoleCommandSignalableCommandInterface(): void
    {
        self::assertTrue(is_a(BugfixFinishCommand::class, SignalableCommandInterface::class, true));
    }
}
