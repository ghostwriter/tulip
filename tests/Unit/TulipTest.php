<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\Tulip\Interface\TulipInterface;
use Ghostwriter\Tulip\Tulip;
use PHPUnit\Framework\Attributes\CoversClass;
use Throwable;

use function is_a;

#[CoversClass(Tulip::class)]
final class TulipTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsTulipInterface(): void
    {
        self::assertTrue(is_a(Tulip::class, TulipInterface::class, true));
    }
}
