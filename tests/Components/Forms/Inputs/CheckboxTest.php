<?php
  
declare(strict_types=1);

test('the component can be rendered', function () {
    expect($this->blade('<x-checkbox name="remember_me"/>'))->toMatchSnapshot();
});

test('specific attributes can be overwritten', function () {
    expect($this->blade(
        '<x-checkbox name="remember_me" id="rememberMe" class="p-4" />'
    ))->toMatchSnapshot();
});

test('inputs can have old values', function () {
    $this->flashOld(['remember_me' => true]);

    expect($this->blade('<x-checkbox name="remember_me"/>'))->toMatchSnapshot();
});
