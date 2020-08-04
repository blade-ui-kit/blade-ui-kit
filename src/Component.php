<?php

declare(strict_types=1);

namespace BladeUIKit;

use Illuminate\View\Component as IlluminateComponent;

abstract class Component extends IlluminateComponent
{
    /** @var array */
    protected static $assets = [];

    public static function assets(): array
    {
        return static::$assets;
    }
}
