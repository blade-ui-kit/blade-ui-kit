<?php
  
declare(strict_types=1);

test('the component can be rendered', function () {
    assertComponentRenders(
        '<img src="https://unavatar.io/johndoe?" />',
        '<x-avatar search="johndoe"/>',
    );
});

it('can have a given avatar image', function () {
    assertComponentRenders(
        '<img src="https://example.com/image.png" />',
        '<x-avatar search="johndoe" src="https://example.com/image.png"/>',
    );
});

it('accepts providers', function () {
    assertComponentRenders(
        '<img src="https://unavatar.io/gravatar/john@example.com?" />',
        '<x-avatar search="john@example.com" provider="gravatar"/>',
    );
});

it('accepts fallbacks', function () {
    assertComponentRenders(
        '<img src="https://unavatar.io/johndoe?fallback=https%3A%2F%2Fexample.com%2Fimage.png" />',
        '<x-avatar search="johndoe" fallback="https://example.com/image.png"/>',
    );
});
