<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Http;

beforeEach(function () {
    config()->set('services.unsplash.access_key', 'testing');
});

it('can be rendered', function () {
    $url = 'https://images.unsplash.com/photo-1550340499-a6c60fc8287c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEzNDg5Mn0';

    Http::fake([
        'unsplash.com/*' => Http::response(['urls' => ['raw' => $url]], 200, ['Headers']),
    ]);

    expect($this->blade('<x-unsplash photo="t9Td0zfDTwI"/>'))->toMatchSnapshot();
});

it('can set a specific width or height', function () {
    $url = 'https://images.unsplash.com/photo-1550340499-a6c60fc8287c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEzNDg5Mn0&';

    Http::fake([
        'unsplash.com/*' => Http::response(['urls' => ['raw' => $url]], 200, ['Headers']),
    ]);

    expect($this->blade('<x-unsplash photo="t9Td0zfDTwI" width="200"/>'))->toMatchSnapshot();
});
