<?php
  
declare(strict_types=1);

test('the component can be rendered', function () {
    expect(blade('<x-avatar search="johndoe"/>'))->toMatchSnapshot();
});

it('can have a given avatar image', function () {
    expect(blade(
        '<x-avatar search="johndoe" src="https://example.com/image.png"/>'
    ))->toMatchSnapshot();
});

it('accepts providers', function () {
    expect(blade(
        '<x-avatar search="john@example.com" provider="gravatar"/>'
    ))->toMatchSnapshot();
});

it('accepts fallbacks', function () {
    expect(blade(
        '<x-avatar search="johndoe" fallback="https://example.com/image.png"/>'
    ))->toMatchSnapshot();
});
