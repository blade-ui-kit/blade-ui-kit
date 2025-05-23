<?php

declare(strict_types=1);

test('the component can be rendered', function () {
    expect(blade('<x-money>123</x-money>'))->toMatchSnapshot();
});

it('handles whitespace', function () {
    $html = <<<HTML
        <x-money>
            123
        </x-money>
    HTML;

    expect(blade($html))->toMatchSnapshot();
});

it('handles floating point numbers', function () {
    expect(blade('<x-money>123.45</x-money>'))->toMatchSnapshot();
});

it('accepts currency', function () {
    expect(blade('<x-money currency="SEK">123</x-money>'))->toMatchSnapshot();
});

it('accepts locale', function () {
    expect(blade('<x-money locale="sv">123</x-money>'))->toMatchSnapshot();
});

it('falls back to app.locale', function () {
    config()->set('app.locale', 'sv');

    expect(blade('<x-money>123</x-money>'))->toMatchSnapshot();
});
