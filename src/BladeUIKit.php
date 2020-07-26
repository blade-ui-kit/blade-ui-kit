<?php

declare(strict_types=1);

namespace BladeUI;

final class BladeUIKit
{
    /** @var array  */
    private static $styles = [];

    /** @var array  */
    private static $scripts = [];

    public static function addStyle(string $style): void
    {
        if (! in_array($style, static::$styles)) {
            static::$styles[] = $style;
        }
    }

    public static function styles(): array
    {
        return static::$styles;
    }

    public static function outputStyles(): string
    {
        return collect(static::$styles)->map(function (string $style) {
            return '<link href="' . $style . '" rel="stylesheet" />';
        })->implode(PHP_EOL);
    }

    public static function addScript(string $style): void
    {
        if (! in_array($style, static::$scripts)) {
            static::$scripts[] = $style;
        }
    }

    public static function scripts(): array
    {
        return static::$scripts;
    }

    public static function outputScripts(): string
    {
        return collect(static::$scripts)->map(function (string $script) {
            return '<script src="' . $script . '"></script>';
        })->implode(PHP_EOL);
    }
}
