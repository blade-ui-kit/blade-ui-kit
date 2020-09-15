<?php

declare(strict_types=1);

namespace Tests\Components\Support;

use Illuminate\Support\Facades\Http;
use Tests\Components\ComponentTestCase;

class UnsplashTest extends ComponentTestCase
{
    protected function getEnvironmentSetUp($app): void
    {
        parent::getEnvironmentSetUp($app);

        $app['config']->set('services.unsplash.access_key', 'testing');
    }

    /** @test */
    public function it_can_be_rendered()
    {
        $url = 'https://images.unsplash.com/photo-1550340499-a6c60fc8287c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEzNDg5Mn0';

        $expected = sprintf('<img src="%s" />', $url);

        Http::fake([
            'unsplash.com/*' => Http::response(['urls' => ['raw' => $url]], 200, ['Headers']),
        ]);

        $this->assertComponentRenders($expected, '<x-unsplash photo="t9Td0zfDTwI"/>');
    }

    /** @test */
    public function it_can_set_a_specific_width_or_height()
    {
        $url = 'https://images.unsplash.com/photo-1550340499-a6c60fc8287c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEzNDg5Mn0&';

        $expected = sprintf('<img src="%s" />', $url.'&w=200');

        Http::fake([
            'unsplash.com/*' => Http::response(['urls' => ['raw' => $url]], 200, ['Headers']),
        ]);

        $this->assertComponentRenders($expected, '<x-unsplash photo="t9Td0zfDTwI" width="200"/>');
    }
}
