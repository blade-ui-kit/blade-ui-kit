<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

test('the component can be rendered', function () {
    Route::post('logout', function () {
        // ...
    })->name('logout');

    $template = <<<'HTML'
            <x-logout />
            HTML;

    $expected = <<<'HTML'
            <form method="POST" action="http://localhost/logout">
                <input type="hidden" name="_token" value="" autocomplete="off">
                <button type="submit">
                Log out </button>
            </form>
            HTML;

    assertComponentRenders($expected, $template);
});

test('the action text and attributes can be set', function () {
    $template = <<<'HTML'
            <x-logout action="http://example.com" class="text-gray-500">Sign Out</x-logout>
            HTML;

    $expected = <<<'HTML'
            <form method="POST" action="http://example.com">
                <input type="hidden" name="_token" value="" autocomplete="off">
                <button type="submit" class="text-gray-500">
                Sign Out </button>
            </form>
            HTML;

    assertComponentRenders($expected, $template);
});
