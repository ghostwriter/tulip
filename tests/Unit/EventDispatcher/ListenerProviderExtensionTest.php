<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher;

use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\EventDispatcher\Container\AbstractListenerProviderExtension;
use Ghostwriter\Tulip\EventDispatcher\ListenerProviderExtension;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(ListenerProviderExtension::class)]
final class ListenerProviderExtensionTest extends AbstractTestCase
{
    public function testExtendsGhostwriterEventDispatcherContainerAbstractListenerProviderExtension(): void
    {
        self::assertTrue(is_a(ListenerProviderExtension::class, AbstractListenerProviderExtension::class, true));
    }

    public function testImplementsGhostwriterContainerInterfaceServiceExtensionInterface(): void
    {
        self::assertTrue(is_a(ListenerProviderExtension::class, ExtensionInterface::class, true));
    }
}
