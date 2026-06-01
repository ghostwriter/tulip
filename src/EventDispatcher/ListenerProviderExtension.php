<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\EventDispatcher;

use Ghostwriter\EventDispatcher\Container\AbstractListenerProviderExtension;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\Tulip\EventDispatcher\Event\BugfixFinishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\BugfixFinishEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\BugfixPublishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\BugfixPublishEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\BugfixStartedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\BugfixStartEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\FeatureFinishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\FeatureFinishEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\FeaturePublishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\FeaturePublishEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\FeatureStartedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\FeatureStartEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\HotfixFinishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\HotfixFinishEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\HotfixPublishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\HotfixPublishEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\HotfixStartedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\HotfixStartEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\ReleaseFinishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\ReleaseFinishEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\ReleasePublishedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\ReleasePublishEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\ReleaseStartedEvent;
use Ghostwriter\Tulip\EventDispatcher\Event\ReleaseStartEvent;
use Tests\Unit\EventDispatcher\ListenerProviderExtensionTest;

/**
 * @see ListenerProviderExtensionTest
 *
 * @extends AbstractListenerProviderExtension<ListenerProviderInterface>
 */
final readonly class ListenerProviderExtension extends AbstractListenerProviderExtension
{
    /** @var array<'object'|class-string,list<class-string>> */
    public const array LISTENERS = [
        'object' => [],

        BugfixFinishEvent::class => [],
        BugfixPublishEvent::class => [],
        BugfixStartEvent::class => [],
        FeatureFinishEvent::class => [],
        FeaturePublishEvent::class => [],
        FeatureStartEvent::class => [],
        HotfixFinishEvent::class => [],
        HotfixPublishEvent::class => [],
        HotfixStartEvent::class => [],
        ReleaseFinishEvent::class => [],
        ReleasePublishEvent::class => [],
        ReleaseStartEvent::class => [],

        BugfixFinishedEvent::class => [],
        BugfixPublishedEvent::class => [],
        BugfixStartedEvent::class => [],
        FeatureFinishedEvent::class => [],
        FeaturePublishedEvent::class => [],
        FeatureStartedEvent::class => [],
        HotfixFinishedEvent::class => [],
        HotfixPublishedEvent::class => [],
        HotfixStartedEvent::class => [],
        ReleaseFinishedEvent::class => [],
        ReleasePublishedEvent::class => [],
        ReleaseStartedEvent::class => [],
    ];
}
