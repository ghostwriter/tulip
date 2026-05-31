<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Container;

use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\BuilderInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\Container\Service\Provider\AbstractProvider;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\Tulip\Configuration\TulipConfiguration;
use Ghostwriter\Tulip\Console\ApplicationFactory;
use Ghostwriter\Tulip\EventDispatcher\ListenerProviderExtension;
use Ghostwriter\Tulip\Interface\TulipInterface;
use Ghostwriter\Tulip\Tulip;
use Override;
use Symfony\Component\Console\Application;
use Throwable;

use const DIRECTORY_SEPARATOR;

use function assert;
use function dirname;
use function implode;
use function is_dir;

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
