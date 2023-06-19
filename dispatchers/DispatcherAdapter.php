<?php

declare(strict_types=1);

namespace app\dispatchers;

use Psr\EventDispatcher\ListenerProviderInterface;
use Psr\EventDispatcher\StoppableEventInterface;
use Psr\EventDispatcher\EventDispatcherInterface as DispatcherInterface;

class DispatcherAdapter implements EventDispatcherInterface
{
    public function __construct(
        private DispatcherInterface $eventDispatcher
    ) {
    }

    public function dispatch(string $event, ?array $attributes = []): object
    {

        $reflection = new \ReflectionClass($event);
        $eventClass = $reflection->newInstanceArgs($attributes);

        return $this->eventDispatcher->dispatch($eventClass);

//        /** @var callable $listener */
//        foreach ($this->listenerProvider->getListenersForEvent($event) as $listener) {
//            if ($event instanceof StoppableEventInterface && $event->isPropagationStopped()) {
//                return $event;
//            }
//
//            $spoofableEvent = $event;
//            $listener($spoofableEvent);
//        }
//
//        return $event;
    }
}