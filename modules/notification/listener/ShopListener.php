<?php

declare(strict_types=1);

namespace app\modules\notification\listener;

use app\dispatchers\EventInterface;
use app\modules\shop\Event\ShopEvent;

class ShopListener
{
    /**
     * @param ShopEvent $event
     * @return void
     */
    public function __invoke(EventInterface $event): void
    {
        dd($event->name);
    }
}