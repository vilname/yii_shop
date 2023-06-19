<?php

declare(strict_types=1);

namespace app\service;

/**
 * @property string $name
 */
class SiteEvent
{
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}