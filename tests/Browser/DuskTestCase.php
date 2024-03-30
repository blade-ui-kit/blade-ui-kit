<?php

namespace Tests\Browser;

use BladeUIKit\BladeUIKitServiceProvider;
use Livewire\LivewireServiceProvider;

abstract class DuskTestCase extends \Orchestra\Testbench\Dusk\TestCase 
{
    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            BladeUIKitServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function defineEnvironment($app): void
    {
        $app['config']->set('app.key', 'base64:Hupx3yAySikrM2/edkZQNQHslgDWYfiBfCuSThJ5SK8=');

        $app['config']->set('app.env', env('APP_ENV', 'testing'));
        $app['config']->set('app.debug', env('APP_DEBUG', true));
        $app['config']->set('app.url', $this->applicationBaseUrl());
    }

    /**
     * Define web routes setup.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function defineWebRoutes($router)
    {
        $router->get('/blade-ui-kit/blade/{componentConfigs}', function ($componentConfigs) {
            $html = ComponentConfig::deserializeComponentConfigsToHtml(
                urldecode($componentConfigs)
            );

            return ComponentConfig::wrapComponentHtml($html);
        })->name('blade-ui-kit.component');
    }

    /**
     * Make a route to a page containing the specified Blade component(s).
     * 
     * @param ComponentConfig[]|ComponentConfig $componentConfig 
     * @return string 
     */
    protected function makeComponentRoute($componentConfigs)
    {
        if (!is_array($componentConfigs)) {
            $componentConfigs = [$componentConfigs];
        }

        $componentConfigs = urlencode(
            ComponentConfig::serializeComponentsConfigs($componentConfigs)
        );

        return route('blade-ui-kit.component', compact('componentConfigs'), false);
    }
}
