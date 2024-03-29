<?php

declare(strict_types=1);
  
test('the component can be rendered', function () {
    expect($this->blade('<x-trix name="about"/>'))->toMatchSnapshot();
});

test('editor can have old values', function () {
    $this->flashOld(['about' => 'About me text']);

    expect($this->blade('<x-trix name="about"/>'))->toMatchSnapshot();
});
