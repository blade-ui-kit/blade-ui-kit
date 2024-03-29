<?php

declare(strict_types=1);

test('the component can be rendered', function () {
    expect($this->blade('<x-pikaday name="birthday"/>'))->toMatchSnapshot();
});

test('pikaday can have old values', function () {
    $this->flashOld(['birthday' => '23/03/1989']);

    expect($this->blade('<x-pikaday name="birthday"/>'))->toMatchSnapshot();
});
