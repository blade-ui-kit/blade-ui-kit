<?php

namespace Tests\Browser;

use BladeUIKit\BladeUIKitServiceProvider;
use Livewire\LivewireServiceProvider;

abstract class DuskTestCase extends \Orchestra\Testbench\Dusk\TestCase 
{
    use BuildsComponents;

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
        $router->get('/blade-ui-kit/livewire/{component}/{attributes?}', function ($component, $attributes = '[]') {
            $attributes = $this->deserializeAttributes($attributes);

            return $this->buildComponentHtml("<livewire:$component $attributes />");
        })->name('blade-ui-kit.livewire');

        $router->get('/blade-ui-kit/blade/{component}/{attributes?}', function ($component, $attributes = '[]') {
            $attributes = $this->deserializeAttributes($attributes);

            return $this->buildComponentHtml("<x-dynamic-component component=\"$component\" $attributes />");
        })->name('blade-ui-kit.component');
    }

    protected function makeComponentRoute($component, $attributes = [])
    {
        $attributes = urlencode($this->serializeAttributes($attributes));

        return route('blade-ui-kit.component', compact('component', 'attributes'), false);
    }
}
