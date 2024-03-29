<?php

declare(strict_types=1);

test('the component can be rendered', function () {
    expect($this->blade('<x-label for="first_name"/>'))->toMatchSnapshot();
});
