<?php

declare(strict_types=1);

use Carbon\Carbon;

afterEach(function () {
    Carbon::setTestNow();
});

test('the component can be rendered', function () {
    $expected = <<<'HTML'
            <span title="2 hours from now">
                2020-05-13 23:00:00
            </span>
            HTML;

    Carbon::setTestNow(new Carbon('2020-05-13 21:00:00', 'CET'));

    assertComponentRenders($expected, '<x-carbon :date="$date"/>', [
        'date' => new Carbon('2020-05-13 23:00:00', 'CET'),
    ]);
});

test('its component can be rendered in a specific format', function () {
    $expected = <<<'HTML'
            <span title="2 hours from now">
                13/05/2020 23:00
            </span>
            HTML;

    Carbon::setTestNow(new Carbon('2020-05-13 21:00:00', 'CET'));

    assertComponentRenders($expected, '<x-carbon :date="$date" format="d/m/Y H:i"/>', [
        'date' => new Carbon('2020-05-13 23:00:00', 'CET'),
    ]);
});

test('its component can be rendered as human readable', function () {
    $expected = <<<'HTML'
            <time datetime="2020-05-13 23:00:00">
                2 hours from now
            </time>
            HTML;

    Carbon::setTestNow(new Carbon('2020-05-13 21:00:00', 'CET'));

    assertComponentRenders($expected, '<x-carbon :date="$date" human/>', [
        'date' => new Carbon('2020-05-13 23:00:00', 'CET'),
    ]);
});

it('can be displayed in the local timezone', function () {
    $expected = <<<'HTML'
            <span x-data="{ formatLocalTimeZone: function (element, timestamp) { const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone; const date = moment.unix(timestamp).tz(timeZone); element.innerHTML = date.format('YYYY-MM-DD HH:mm:ss (z)'); } }" x-init="formatLocalTimeZone($el, 1589407200)" title="2 hours from now">
                2020-05-13 23:00:00
            </span>
            HTML;

    Carbon::setTestNow(new Carbon('2020-05-13 21:00:00', 'CET'));

    assertComponentRenders($expected, '<x-carbon :date="$date" local/>', [
        'date' => new Carbon('2020-05-13 23:00:00', 'CET'),
    ]);
});
