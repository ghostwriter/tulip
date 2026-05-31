<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\EventDispatcher;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\Tulip\Configuration\TulipConfiguration;
use Override;
use Throwable;

use function assert;

/**
 * @see ListenerProviderExtensionTest
 *
 * @implements ExtensionInterface<ListenerProviderInterface>
 */
final readonly class ListenerProviderExtension implements ExtensionInterface
{
    /**
     * @param ListenerProviderInterface $service
     *
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container, object $service): void
    {
        assert($service instanceof ListenerProviderInterface);

        // $configuration = $container->get(TulipConfiguration::class);

        // assert($configuration instanceof TulipConfiguration);
        // /** @var list<class-string> $listeners */
        // foreach ($configuration->get('ghostwriter.event-dispatcher', []) as $event => $listeners) {
        //     foreach ($listeners as $listener) {
        //         $service->listen($event, $listener);
        //     }
        // }
    }
}
