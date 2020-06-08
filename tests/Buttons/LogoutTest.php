<?php

declare(strict_types=1);

namespace Tests\Buttons;

use Illuminate\Support\Facades\Route;
use Tests\ComponentTestCase;

class LogoutTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        Route::post('logout', function () {
            // ...
        })->name('logout');

        $template = <<<HTML
<x-logout />
HTML;

        $expected = <<<HTML
<form method="POST" action="http://localhost/logout">
    <input type="hidden" name="_token" value="">
    <input type="hidden" name="_method" value="POST">
    <button type="submit">
    Sign Out </button>
</form>
HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_action_text_and_attributes_can_be_set()
    {
        $template = <<<HTML
<x-logout action="http://example.com" class="text-gray-500">Logout</x-logout>
HTML;

        $expected = <<<HTML
<form method="POST" action="http://example.com">
    <input type="hidden" name="_token" value="">
    <input type="hidden" name="_method" value="POST">
    <button type="submit" class="text-gray-500">
    Logout </button>
</form>
HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
