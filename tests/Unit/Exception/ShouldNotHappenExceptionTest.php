<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Exception;
use Ghostwriter\Tulip\Exception\ShouldNotHappenException;
use Ghostwriter\Tulip\Interface\TulipExceptionInterface;
use LogicException;
use PHPUnit\Framework\Attributes\CoversClass;
use Stringable;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(ShouldNotHappenException::class)]
final class ShouldNotHappenExceptionTest extends AbstractTestCase
{
    public function testExtendsException(): void
    {
        self::assertTrue(is_a(ShouldNotHappenException::class, Exception::class, true));
    }

    public function testExtendsLogicException(): void
    {
        self::assertTrue(is_a(ShouldNotHappenException::class, LogicException::class, true));
    }

    public function testImplementsGhostwriterTulipInterfaceTulipExceptionInterface(): void
    {
        self::assertTrue(is_a(ShouldNotHappenException::class, TulipExceptionInterface::class, true));
    }

    public function testImplementsStringable(): void
    {
        self::assertTrue(is_a(ShouldNotHappenException::class, Stringable::class, true));
    }

    public function testImplementsThrowable(): void
    {
        self::assertTrue(is_a(ShouldNotHappenException::class, Throwable::class, true));
    }
}
