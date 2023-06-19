<?php

declare(strict_types=1);

namespace app\dispatchers;

interface EventDispatcher
{
    public function dispatch(array $events): void;
}