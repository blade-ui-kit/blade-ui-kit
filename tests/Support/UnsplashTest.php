<?php

declare(strict_types=1);

namespace Tests\Support;

use Illuminate\Support\Facades\Http;
use Tests\ComponentTestCase;

final class UnsplashTest extends ComponentTestCase
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

        $this->assertComponentRenders($expected, '<x-unsplash photo-id="t9Td0zfDTwI"/>');
    }
}
