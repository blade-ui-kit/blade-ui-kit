<?php
  
declare(strict_types=1);

test('the component can be rendered', function () {
    assertComponentRenders(
        '<input name="email" type="email" id="email" />',
        '<x-email/>',
    );
});

test('specific attributes can be overwritten', function () {
    assertComponentRenders(
        '<input name="email_address" type="email" id="emailAddress" class="p-4" />',
        '<x-email name="email_address" id="emailAddress" class="p-4" />',
    );
});

test('inputs can have old values', function () {
    $this->flashOld(['email' => 'Eloquent']);

    assertComponentRenders(
        '<input name="email" type="email" id="email" value="Eloquent" />',
        '<x-email/>',
    );
});
