<?php

declare(strict_types=1);

namespace app\dispatchers;

use Yiisoft\EventDispatcher\Provider\ListenerCollection;

class ListenerCollectionFactory
{
    private ListenerCollection $listenerCollection;

    public function __construct(ListenerCollection $listenerCollection)
    {
        $this->listenerCollection = $listenerCollection;
    }
}