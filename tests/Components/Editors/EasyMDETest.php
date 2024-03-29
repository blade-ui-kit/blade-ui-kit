<?php
  
declare(strict_types=1);

test('the component can be rendered', function () {
    expect(blade('<x-easy-mde name="about"/>'))->toMatchSnapshot();
});

test('editor can have old values', function () {
    $this->flashOld(['about' => 'About me text']);

    expect(blade('<x-easy-mde name="about"/>'))->toMatchSnapshot();
});

test('editor can have options', function () {
    expect(blade(
        '<x-easy-mde name="about" :options="[\'minHeight\' => \'500px\']"/>'
    ))->toMatchSnapshot();
});
