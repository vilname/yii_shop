<?php

declare(strict_types=1);

namespace app\modules\shop\Event;

use app\dispatchers\EventInterface;

/**
 * @property string $name
 */
class ShopEvent implements EventInterface
{
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}