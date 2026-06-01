<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Event;

use Ghostwriter\Tulip\EventDispatcher\Event\ReleaseStartedEvent;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ReleaseStartedEvent::class)]
final class ReleaseStartedEventTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
