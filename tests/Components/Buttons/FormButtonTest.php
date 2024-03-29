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

    expect(blade($template))->toMatchSnapshot();
});

test('the method and attributes can be set', function () {
    $template = <<<'HTML'
            <x-form-button method="DELETE" action="http://example.com" class="text-gray-500">
                Logout
            </x-form-button>
            HTML;

    expect(blade($template))->toMatchSnapshot();
});

test('the action prop is optional', function () {
    $template = <<<'HTML'
            <x-form-button method="DELETE">
                Logout
            </x-form-button>
            HTML;

    expect(blade($template))->toMatchSnapshot();
});
