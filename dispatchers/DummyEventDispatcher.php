<?php

declare(strict_types=1);

namespace app\dispatchers;

class DummyEventDispatcher implements EventDispatcher
{
    public function dispatch(array $events): void
    {
        foreach ($events as $event) {
            \Yii::info('Dispatch event ' . \get_class($event));
        }
    }
}