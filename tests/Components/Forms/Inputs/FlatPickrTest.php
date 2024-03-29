<?php
  
declare(strict_types=1);

test('the component can be rendered', function () {
    expect(blade('<x-flat-pickr name="birthday"/>'))->toMatchSnapshot();
});

test('flatpickr can have old values', function () {
    $this->flashOld(['birthday' => '23/03/1989']);

    expect(blade('<x-flat-pickr name="birthday"/>'))->toMatchSnapshot();
});
