<?php

declare(strict_types=1);

namespace BladeUI;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;

final class BladeUIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blade-ui-kit.php', 'blade-ui-kit');
    }

    public function boot(): void
    {
        $this->bootResources();
        $this->bootBladeComponents();
        $this->bootLivewireComponents();
        $this->bootDirectives();
        $this->bootPublishing();
    }

    private function bootResources(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'blade-ui');
    }

    private function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            foreach (config('blade-ui-kit.components', []) as $alias => $component) {
                $blade->component($component, $alias, config('blade-ui-kit.prefix', ''));

                foreach ($component::styles() as $style) {
                    BladeUI::addStyle($style);
                }

                foreach ($component::scripts() as $script) {
                    BladeUI::addScript($script);
                }
            }
        });
    }

    private function bootLivewireComponents(): void
    {
        // Skip if Livewire isn't installed.
        if (! class_exists(Livewire::class)) {
            return;
        }

        foreach (config('blade-ui-kit.livewire', []) as $alias => $component) {
            if ($prefix = config('blade-ui-kit.prefix', '')) {
                $alias = "$prefix-$alias";
            }

            Livewire::component($alias, $component);
        }
    }

    private function bootDirectives(): void
    {
        Blade::directive('bladeUIStyles', function () {
            return "<?php echo BladeUI\\BladeUI::outputStyles(); ?>";
        });

        Blade::directive('bladeUIScripts', function () {
            return "<?php echo BladeUI\\BladeUI::outputScripts(); ?>";
        });
    }

    private function bootPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/blade-ui-kit.php' => $this->app->configPath('blade-ui-kit.php'),
            ], 'blade-ui-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => $this->app->resourcePath('views/vendor/blade-ui-kit'),
            ], 'blade-ui-views');
        }
    }
}
