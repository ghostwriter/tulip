<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Event;

use Ghostwriter\Tulip\EventDispatcher\Event\FeatureStartEvent;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(FeatureStartEvent::class)]
final class FeatureStartEventTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
