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

    expect($this->blade($template))->toMatchSnapshot();
});

test('the action text and attributes can be set', function () {
    $template = <<<'HTML'
            <x-logout action="http://example.com" class="text-gray-500">Sign Out</x-logout>
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});
