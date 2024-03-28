<?php

declare(strict_types=1);

beforeEach(function () {
    config()->set('services.mapbox.public_token', 'testing');
});

test('the component can be rendered', function () {
    $expected = <<<HTML
            <div x-data="
            { initMapbox: function () { mapboxgl.accessToken = 'testing'; var map = new mapboxgl.Map({&quot;container&quot;:&quot;map&quot;,&quot;style&quot;:&quot;mapbox:\/\/styles\/mapbox\/streets-v11&quot;}); }
            }" x-init="initMapbox()" id="map"></div>
            HTML;

    $this->assertComponentRenders($expected, '<x-mapbox/>');
});

test('options can be passed', function () {
    $expected = <<<HTML
            <div x-data="
            { initMapbox: function () { mapboxgl.accessToken = 'testing'; var map = new mapboxgl.Map({&quot;container&quot;:&quot;custom-map&quot;,&quot;style&quot;:&quot;mapbox:\/\/styles\/mapbox\/streets-v11&quot;,&quot;zoom&quot;:0}); }
            }" x-init="initMapbox()" id="custom-map"></div>
            HTML;

    $this->assertComponentRenders($expected, '<x-mapbox id="custom-map" :options="[\'zoom\' => 0]"/>');
});

test('markers can be placed', function () {
    $expected = <<<HTML
            <div x-data="
            { initMapbox: function () { mapboxgl.accessToken = 'testing'; var map = new mapboxgl.Map({&quot;container&quot;:&quot;map&quot;,&quot;style&quot;:&quot;mapbox:\/\/styles\/mapbox\/streets-v11&quot;}); new mapboxgl.Marker() .setLngLat([13.41053,52.52437]) .addTo(map); }
            }" x-init="initMapbox()" id="map"></div>
            HTML;

    $this->assertComponentRenders($expected, '<x-mapbox :markers="[[13.4105300, 52.5243700]]"/>');
});
