<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

test('the component can be rendered', function () {
    Route::post('logout', function () {
        // ...
    })->name('logout');

    $template = <<<'HTML'
            <x-form-button :action="route('logout')">
                Sign Out
            </x-form-button>
            HTML;

    $expected = <<<'HTML'
            <form method="POST" action="http://localhost/logout">
                <input type="hidden" name="_token" value="" autocomplete="off">
                <input type="hidden" name="_method" value="POST">
                <button type="submit">
                Sign Out </button>
            </form>
            HTML;

    $this->assertComponentRenders($expected, $template);
});

test('the method and attributes can be set', function () {
    $template = <<<'HTML'
            <x-form-button method="DELETE" action="http://example.com" class="text-gray-500">
                Logout
            </x-form-button>
            HTML;

    $expected = <<<'HTML'
            <form method="POST" action="http://example.com">
                <input type="hidden" name="_token" value="" autocomplete="off">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="text-gray-500">
                Logout </button>
            </form>
            HTML;

    $this->assertComponentRenders($expected, $template);
});

test('the action prop is optional', function () {
    $template = <<<'HTML'
            <x-form-button method="DELETE">
                Logout
            </x-form-button>
            HTML;

    $expected = <<<'HTML'
            <form method="POST">
                <input type="hidden" name="_token" value="" autocomplete="off">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">
                Logout </button>
            </form>
            HTML;

    $this->assertComponentRenders($expected, $template);
});
