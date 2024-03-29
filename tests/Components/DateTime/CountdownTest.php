<?php

declare(strict_types=1);

use Carbon\Carbon;

beforeEach(function () {
    Carbon::setTestNow(new Carbon('2020-06-10 18:00:00', 'CET'));
});

test('the component can be rendered', function () {
    expect(
        '<x-countdown :expires="new Carbon\Carbon(\'2020-06-11 17:15:22\', \'CET\')"/>'
    )->toMatchSnapshot();
});

test('the component can be slotted', function () {
    $template = <<<HTML
            <x-countdown :expires="new Carbon\Carbon('2020-06-11 17:15:22', 'CET')">
                <span x-text="timer.days">00</span> days
                <span x-text="timer.hours">23</span> hours
                <span x-text="timer.minutes">15</span> minutes
                <span x-text="timer.seconds">22</span> seconds
            </x-countdown>
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});
