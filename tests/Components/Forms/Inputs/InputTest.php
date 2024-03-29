<?php
  
declare(strict_types=1);

test('the component can be rendered', function () {
    expect($this->blade('<x-input name="search" />'))->toMatchSnapshot();
});

test('specific attributes can be overwritten', function () {
    expect($this->blade(
        '<x-input name="confirm_password" id="confirmPassword" type="password" class="p-4" />'
    ))->toMatchSnapshot();
});

test('inputs can have old values', function () {
    $this->flashOld(['search' => 'Eloquent']);

    expect($this->blade('<x-input name="search" />'))->toMatchSnapshot();
});
