<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Event;

use Ghostwriter\Tulip\EventDispatcher\Event\ReleaseStartEvent;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ReleaseStartEvent::class)]
final class ReleaseStartEventTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
