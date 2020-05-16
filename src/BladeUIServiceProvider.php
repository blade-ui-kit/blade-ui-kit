<?php

declare(strict_types=1);

namespace BladeUI;

use Illuminate\Support\ServiceProvider;

final class BladeUIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();
    }

    public function boot(): void
    {
        $this->bootResources();
        $this->bootComponents();
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blade-ui-kit.php', 'blade-ui-kit');
    }

    private function bootResources(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'blade-ui');
    }

    private function bootComponents(): void
    {
        $config = $this->app->make('config')->get('blade-ui-kit');

        $this->loadViewComponentsAs($config['prefix'], $config['components']);
    }
}
