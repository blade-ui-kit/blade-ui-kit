<?php

  
declare(strict_types=1);
use PHPUnit\Framework\Attributes\Test;
test('the component can be rendered', function () {
    $this->assertComponentRenders(
        '<input name="password" type="password" id="password" />',
        '<x-password/>',
    );
});
test('specific attributes can be overwritten', function () {
    $this->assertComponentRenders(
        '<input name="confirm_password" type="password" id="confirmPassword" class="p-4" />',
        '<x-password name="confirm_password" id="confirmPassword" class="p-4" />',
    );
});
test('inputs cannot have old values', function () {
    $this->flashOld(['password' => 'secret']);

    $this->assertComponentRenders(
        '<input name="password" type="password" id="password" />',
        '<x-password/>',
    );
});
