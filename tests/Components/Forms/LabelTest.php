<?php

declare(strict_types=1);

test('the component can be rendered', function () {
    expect(blade('<x-label for="first_name"/>'))->toMatchSnapshot();
});

test('the component can render with a slot', function () {
    expect(blade('<x-label for="first_name">Your first name</x-label>'))->toMatchSnapshot();
});
