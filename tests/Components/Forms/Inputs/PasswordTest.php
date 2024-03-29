<?php

declare(strict_types=1);

test('the component can be rendered', function () {
    expect(blade('<x-password/>'))->toMatchSnapshot();
});

test('specific attributes can be overwritten', function () {
    expect(blade(
        '<x-password name="confirm_password" id="confirmPassword" class="p-4" />'
    ))->toMatchSnapshot();
});

test('inputs cannot have old values', function () {
    $this->flashOld(['password' => 'secret']);

    expect(blade('<x-password/>'))->toMatchSnapshot();
});
