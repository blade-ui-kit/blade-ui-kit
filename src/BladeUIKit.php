<?php

declare(strict_types=1);

namespace BladeUIKit;

final class BladeUIKit
{
    /** @var array */
    private static $styles = [];

    /** @var array */
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

    public static function outputStyles(bool $force = false): string
    {
        if (! $force && static::disableScripts()) {
            return '';
        }

        return collect(static::$styles)->map(function (string $style) {
            return '<link href="'.$style.'" rel="stylesheet" />';
        })->implode(PHP_EOL);
    }

    public static function addScript(string $script): void
    {
        if (! in_array($script, static::$scripts)) {
            static::$scripts[] = $script;
        }
    }

    public static function scripts(): array
    {
        return static::$scripts;
    }

    public static function outputScripts(bool $force = false): string
    {
        if (! $force && static::disableScripts()) {
            return '';
        }

        return collect(static::$scripts)->map(function (string $script) {
            return '<script src="'.$script.'"></script>';
        })->implode(PHP_EOL);
    }

    private static function disableScripts(): bool
    {
        return ! config('app.debug');
    }
}
