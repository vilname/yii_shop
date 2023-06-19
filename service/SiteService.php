<?php

declare(strict_types=1);

namespace app\service;

use Psr\EventDispatcher\EventDispatcherInterface;

class SiteService
{
    private EventDispatcherInterface $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function indexCommand(): void
    {
        $this->eventDispatcher->dispatch(SiteEvent::class);
    }
}