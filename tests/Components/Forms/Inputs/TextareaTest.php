<?php

declare(strict_types=1);

test('the component can be rendered', function () {
    assertComponentRenders(
        '<textarea name="about" id="about" rows="3"></textarea>',
        '<x-textarea name="about"/>',
    );
});

test('specific attributes can be overwritten', function () {
    assertComponentRenders(
        '<textarea name="about" id="aboutMe" rows="5" cols="8" class="p-4">About me text</textarea>',
        '<x-textarea name="about" id="aboutMe" rows="5" cols="8" class="p-4">About me text</x-textarea>',
    );
});

test('inputs can have old values', function () {
    $this->flashOld(['about' => 'About me text']);

    assertComponentRenders(
        '<textarea name="about" id="about" rows="3">About me text</textarea>',
        '<x-textarea name="about"/>',
    );
});
