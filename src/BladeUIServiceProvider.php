<?php

declare(strict_types=1);

namespace BladeUI;

use BladeUI\Support\Cron;
use Illuminate\Support\ServiceProvider;

final class BladeUIServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'blade-ui');

        $this->loadViewComponentsAs('', [
            Cron::class,
        ]);
    }
}
