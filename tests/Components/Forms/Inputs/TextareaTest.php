<?php

declare(strict_types=1);

test('the component can be rendered', function () {
    expect(blade('<x-textarea name="about"/>'))->toMatchSnapshot();
});

test('specific attributes can be overwritten', function () {
    expect(blade(
        '<x-textarea name="about" id="aboutMe" rows="5" cols="8" class="p-4">About me text</x-textarea>'
    ))->toMatchSnapshot();
});

test('inputs can have old values', function () {
    $this->flashOld(['about' => 'About me text']);

    expect(blade('<x-textarea name="about"/>'))->toMatchSnapshot();
});
