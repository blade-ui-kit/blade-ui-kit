<?php

declare(strict_types=1);

namespace BladeUIKit\Components;

use Livewire\Livewire;

abstract class LivewireComponent extends Livewire
{
    /** @var array */
    protected static $assets = [];

    public static function assets(): array
    {
        return static::$assets;
    }
}
