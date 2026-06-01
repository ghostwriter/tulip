<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Command\Release;

use Ghostwriter\Tulip\Console\Command\AbstractCommand;
use Ghostwriter\Tulip\Console\Command\Release\AbstractReleaseCommand;
use Ghostwriter\Tulip\Console\Command\Release\ReleaseStartCommand;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\SignalableCommandInterface;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(ReleaseStartCommand::class)]
final class ReleaseStartCommandTest extends AbstractTestCase
{
    public function testExtendsGhostwriterTulipConsoleCommandAbstractCommand(): void
    {
        self::assertTrue(is_a(ReleaseStartCommand::class, AbstractCommand::class, true));
    }

    public function testExtendsGhostwriterTulipConsoleCommandReleaseAbstractReleaseCommand(): void
    {
        self::assertTrue(is_a(ReleaseStartCommand::class, AbstractReleaseCommand::class, true));
    }

    public function testExtendsSymfonyComponentConsoleCommandCommand(): void
    {
        self::assertTrue(is_a(ReleaseStartCommand::class, Command::class, true));
    }

    public function testImplementsSymfonyComponentConsoleCommandSignalableCommandInterface(): void
    {
        self::assertTrue(is_a(ReleaseStartCommand::class, SignalableCommandInterface::class, true));
    }
}
