<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher\Event;

use Ghostwriter\Tulip\EventDispatcher\Event\FeatureFinishEvent;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(FeatureFinishEvent::class)]
final class FeatureFinishEventTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
