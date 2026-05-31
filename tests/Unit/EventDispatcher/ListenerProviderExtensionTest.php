<?php

declare(strict_types=1);

namespace Tests\Unit\EventDispatcher;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\Tulip\Configuration\TulipConfiguration;
use Ghostwriter\Tulip\EventDispatcher\ListenerProviderExtension;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(ListenerProviderExtension::class)]
final class ListenerProviderExtensionTest extends AbstractTestCase
{
    public function testImplementsExtensionInterface(): void
    {
        self::assertTrue(is_a(ListenerProviderExtension::class, ExtensionInterface::class, true));
    }

    public function testInvokeRegistersConfiguredListeners(): void
    {
        // $configuration = TulipConfiguration::new([
        //     'ghostwriter.event-dispatcher' => [
        //         'App\\Event\\UserRegistered' => [
        //             'App\\Listener\\SendWelcomeEmail',
        //             'App\\Listener\\SyncCrmContact',
        //         ],
        //     ],
        // ]);

        // $container = $this->createMock(ContainerInterface::class);
        // $container->expects(self::once())
        //     ->method('get')
        //     ->with(TulipConfiguration::class)
        //     ->willReturn($configuration)
        //     ->seal();

        $listenerProvider = $this->createMock(ListenerProviderInterface::class);
        $listenerProvider->expects(self::exactly(2))
            ->method('listen')
            ->withParameterSetsInOrder(
                ['App\\Event\\UserRegistered', 'App\\Listener\\SendWelcomeEmail'],
                ['App\\Event\\UserRegistered', 'App\\Listener\\SyncCrmContact'],
            )
            ->seal();

        (new ListenerProviderExtension())($container, $listenerProvider);
    }
}
