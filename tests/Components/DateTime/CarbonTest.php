<?php

declare(strict_types=1);

use Carbon\Carbon;

beforeEach(function () {
    Carbon::setTestNow(new Carbon('2020-05-13 21:00:00', 'CET'));

    $this->data = ['date' => new Carbon('2020-05-13 23:00:00', 'CET')];
});

afterEach(function () {
    Carbon::setTestNow();
});

test('the component can be rendered', function () {
    expect(
        $this->blade('<x-carbon :date="$date"/>', $this->data)
    )->toMatchSnapshot();
});

test('its component can be rendered in a specific format', function () {
    expect(
        $this->blade('<x-carbon :date="$date" format="d/m/Y H:i"/>', $this->data)
    )->toMatchSnapshot();
});

test('its component can be rendered as human readable', function () {
    expect(
        $this->blade('<x-carbon :date="$date" human/>', $this->data)
    )->toMatchSnapshot();
});

it('can be displayed in the local timezone', function () {
    expect(
        $this->blade('<x-carbon :date="$date" local/>', $this->data)
    )->toMatchSnapshot();
});
