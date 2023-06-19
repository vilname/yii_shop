<?php

declare(strict_types=1);

namespace app\listener;

use JetBrains\PhpStorm\NoReturn;

class SiteEventListener
{
    #[NoReturn]
    public function __construct()
    {
        dd('listener');
    }
}