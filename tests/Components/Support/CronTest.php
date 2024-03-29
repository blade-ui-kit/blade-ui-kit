<?php
  
declare(strict_types=1);

use BladeUIKit\Components\Support\Cron;

test('the component can be rendered', function () {
    expect(blade('<x-cron schedule="@weekly"/>'))->toMatchSnapshot();
});

it('can translate a cron', function () {
    $cron = new Cron('0 16 * * 1');

    expect($cron->translate())->toBe('Every Monday at 4:00pm');
});

test('its component can be rendered as human readable', function () {
    expect(blade('<x-cron schedule="@weekly" human/>'))->toMatchSnapshot();
});
