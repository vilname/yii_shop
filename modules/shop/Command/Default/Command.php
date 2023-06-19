<?php

declare(strict_types=1);

namespace app\modules\shop\Command\Default;

use app\dispatchers\EventDispatcherInterface;
use app\modules\shop\Event\ShopEvent;

class Command
{
    private EventDispatcherInterface $eventDispatcher;

    public function __construct(
        EventDispatcherInterface $eventDispatcher,
    ) {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function handler()
    {
        $this->eventDispatcher->dispatch(ShopEvent::class, ['Иван']);

        dd($this->eventDispatcher);
    }
}