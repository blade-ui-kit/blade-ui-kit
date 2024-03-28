<?php
  
declare(strict_types=1);

test('the component can be rendered', function () {
    $this->assertComponentRenders(
        '<input name="search" type="text" id="search" />',
        '<x-input name="search" />',
    );
});

test('specific attributes can be overwritten', function () {
    $this->assertComponentRenders(
        '<input name="confirm_password" type="password" id="confirmPassword" class="p-4" />',
        '<x-input name="confirm_password" id="confirmPassword" type="password" class="p-4" />',
    );
});

test('inputs can have old values', function () {
    $this->flashOld(['search' => 'Eloquent']);

    $this->assertComponentRenders(
        '<input name="search" type="text" id="search" value="Eloquent" />',
        '<x-input name="search" />',
    );
});
