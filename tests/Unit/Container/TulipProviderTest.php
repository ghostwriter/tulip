<?php

declare(strict_types=1);

namespace Tests\Unit\Container;

use Ghostwriter\Container\Interface\Service\ProviderInterface;
use Ghostwriter\Container\Service\Provider\AbstractProvider;
use Ghostwriter\Tulip\Container\TulipProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(TulipProvider::class)]
final class TulipProviderTest extends AbstractTestCase
{
    public function testExtendsGhostwriterContainerServiceProviderAbstractProvider(): void
    {
        self::assertTrue(is_a(TulipProvider::class, AbstractProvider::class, true));
    }

    public function testImplementsGhostwriterContainerInterfaceServiceProviderInterface(): void
    {
        self::assertTrue(is_a(TulipProvider::class, ProviderInterface::class, true));
    }
}
