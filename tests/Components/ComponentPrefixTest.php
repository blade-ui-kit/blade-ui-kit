<?php

declare(strict_types=1);

use Tests\ComponentPrefixTestTrait;

uses(ComponentPrefixTestTrait::class);

test('we can set a config prefix', function () {
    expect($this->blade('<x-ui-cron schedule="@weekly"/>'))->toMatchSnapshot();
});
