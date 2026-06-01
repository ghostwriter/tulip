<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Container;

use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\Container\Service\Provider\AbstractProvider;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\Tulip\Console\ApplicationFactory;
use Ghostwriter\Tulip\EventDispatcher\ListenerProviderExtension;
use Ghostwriter\Tulip\Interface\TulipInterface;
use Ghostwriter\Tulip\Tulip;
use Symfony\Component\Console\Application;

/**
 * @see TulipProviderTest
 */
final class TulipProvider extends AbstractProvider
{
    /**
     * alias => service.
     *
     * @var array<class-string,class-string>
     */
    public const array ALIAS = [
        TulipInterface::class => Tulip::class,
    ];

    /**
     * service => [extension, ...].
     *
     * @var array<class-string,list<class-string<ExtensionInterface>>>
     */
    public const array EXTEND = [
        ListenerProviderInterface::class => [ListenerProviderExtension::class],
    ];

    /**
     * service => factory.
     *
     * @var array<class-string,class-string<FactoryInterface>>
     */
    public const array FACTORY = [
        Application::class => ApplicationFactory::class,
    ];
}
