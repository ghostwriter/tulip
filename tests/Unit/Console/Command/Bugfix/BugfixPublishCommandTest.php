<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Command\Bugfix;

use Ghostwriter\Tulip\Console\Command\AbstractCommand;
use Ghostwriter\Tulip\Console\Command\Bugfix\AbstractBugfixCommand;
use Ghostwriter\Tulip\Console\Command\Bugfix\BugfixPublishCommand;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\SignalableCommandInterface;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(BugfixPublishCommand::class)]
final class BugfixPublishCommandTest extends AbstractTestCase
{
    public function testExtendsGhostwriterTulipConsoleCommandAbstractCommand(): void
    {
        self::assertTrue(is_a(BugfixPublishCommand::class, AbstractCommand::class, true));
    }

    public function testExtendsGhostwriterTulipConsoleCommandBugfixAbstractBugfixCommand(): void
    {
        self::assertTrue(is_a(BugfixPublishCommand::class, AbstractBugfixCommand::class, true));
    }

    public function testExtendsSymfonyComponentConsoleCommandCommand(): void
    {
        self::assertTrue(is_a(BugfixPublishCommand::class, Command::class, true));
    }

    public function testImplementsSymfonyComponentConsoleCommandSignalableCommandInterface(): void
    {
        self::assertTrue(is_a(BugfixPublishCommand::class, SignalableCommandInterface::class, true));
    }
}
