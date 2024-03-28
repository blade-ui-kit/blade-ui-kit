<?php

  
declare(strict_types=1);
use PHPUnit\Framework\Attributes\Test;
test('the component can be rendered', function () {
    $this->assertComponentRenders(
        '<input name="remember_me" type="checkbox" id="remember_me" />',
        '<x-checkbox name="remember_me"/>',
    );
});
test('specific attributes can be overwritten', function () {
    $this->assertComponentRenders(
        '<input name="remember_me" type="checkbox" id="rememberMe" class="p-4" />',
        '<x-checkbox name="remember_me" id="rememberMe" class="p-4" />',
    );
});
test('inputs can have old values', function () {
    $this->flashOld(['remember_me' => true]);

    $this->assertComponentRenders(
        '<input name="remember_me" type="checkbox" id="remember_me" value="1" checked />',
        '<x-checkbox name="remember_me"/>',
    );
});
