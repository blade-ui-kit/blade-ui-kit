<?php

declare(strict_types=1);

namespace BladeUI;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

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
        $this->bootDirectives();
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

        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) use ($config) {
            foreach ($config['components'] as $alias => $component) {
                $blade->component($component, $alias, $config['prefix']);

                foreach ($component::styles() as $style) {
                    BladeUI::addStyle($style);
                }

                foreach ($component::scripts() as $script) {
                    BladeUI::addScript($script);
                }
            }
        });
    }

    protected function bootDirectives()
    {
        Blade::directive('bladeUIStyles', function () {
            return "<?php echo BladeUI\\BladeUI::outputStyles(); ?>";
        });

        Blade::directive('bladeUIScripts', function () {
            return "<?php echo BladeUI\\BladeUI::outputScripts(); ?>";
        });
    }
}
