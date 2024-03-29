<?php

declare(strict_types=1);

test('the component can be rendered', function () {
    expect($this->blade('<x-password/>'))->toMatchSnapshot();
});

test('specific attributes can be overwritten', function () {
    expect($this->blade(
        '<x-password name="confirm_password" id="confirmPassword" class="p-4" />'
    ))->toMatchSnapshot();
});

test('inputs cannot have old values', function () {
    $this->flashOld(['password' => 'secret']);

    expect($this->blade('<x-password/>'))->toMatchSnapshot();
});
