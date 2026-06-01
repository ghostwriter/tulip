<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Event;

use Ghostwriter\Tulip\EventDispatcher\Event\HotfixPublishedEvent;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(HotfixPublishedEvent::class)]
final class HotfixPublishedEventTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
