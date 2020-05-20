<?php

declare(strict_types=1);

namespace BladeUI;

use Illuminate\View\Component as IlluminateComponent;

abstract class Component extends IlluminateComponent
{
    public static function styles(): array
    {
        return [];
    }

    public static function scripts(): array
    {
        return [];
    }
}
