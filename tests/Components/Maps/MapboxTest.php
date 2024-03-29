<?php

declare(strict_types=1);

beforeEach(function () {
    config()->set('services.mapbox.public_token', 'testing');
});

test('the component can be rendered', function () {
    expect(blade('<x-mapbox/>'))->toMatchSnapshot();
});

test('options can be passed', function () {
    expect(blade(
        '<x-mapbox id="custom-map" :options="[\'zoom\' => 0]"/>'
    ))->toMatchSnapshot();
});

test('markers can be placed', function () {
    expect(blade(
        '<x-mapbox :markers="[[13.4105300, 52.5243700]]"/>'
    ))->toMatchSnapshot();
});
