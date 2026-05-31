<?php

declare(strict_types=1);

namespace Tests\Unit\Container;

use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\BuilderInterface;
use Ghostwriter\Container\Service\Provider\AbstractProvider;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\Tulip\Configuration\TulipConfiguration;
use Ghostwriter\Tulip\Console\ApplicationFactory;
use Ghostwriter\Tulip\Container\TulipProvider;
use Ghostwriter\Tulip\EventDispatcher\ListenerProviderExtension;
use Ghostwriter\Tulip\Interface\TulipInterface;
use Ghostwriter\Tulip\Tulip;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\Console\Application;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(TulipProvider::class)]
final class TulipProviderTest extends AbstractTestCase
{
    public function testExtendsAbstractProvider(): void
    {
        self::assertTrue(is_a(TulipProvider::class, AbstractProvider::class, true));
    }

    public function testTulipProviderRegister(): void
    {
        $builder = $this->createMock(BuilderInterface::class);

        $builder->expects(self::exactly(1))
            ->method('set')
            ->withParameterSetsInOrder([
                TulipConfiguration::class,
                self::callback(
                    static fn (ConfigurationInterface $configuration): bool => $configuration instanceof TulipConfiguration
                ),
            ]);

        $builder->expects(self::exactly(2))
            ->method('alias')
            ->withParameterSetsInOrder(
                [TulipInterface::class, Tulip::class],
                [ConfigurationInterface::class, TulipConfiguration::class],
            );

        $builder->expects(self::exactly(1))
            ->method('extend')
            ->withParameterSetsInOrder([ListenerProviderInterface::class, ListenerProviderExtension::class]);

        $builder->expects(self::exactly(1))
            ->method('factory')
            ->withParameterSetsInOrder([Application::class, ApplicationFactory::class])
            ->seal();

        (new TulipProvider())->register($builder);
    }
}
