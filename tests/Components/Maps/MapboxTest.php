<?php

declare(strict_types=1);

namespace Tests\Components\Maps;

use Tests\Components\ComponentTestCase;

class MapboxTest extends ComponentTestCase
{
    protected function getEnvironmentSetUp($app): void
    {
        parent::getEnvironmentSetUp($app);

        $app['config']->set('services.mapbox.public_token', 'testing');
    }

    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<HTML
            <div x-data="
            { initMapbox: function () { mapboxgl.accessToken = 'testing'; var map = new mapboxgl.Map({&quot;container&quot;:&quot;map&quot;,&quot;style&quot;:&quot;mapbox:\/\/styles\/mapbox\/streets-v11&quot;}); }
            }" x-init="initMapbox()" id="map"></div>
            HTML;

        $this->assertComponentRenders($expected, '<x-mapbox/>');
    }

    /** @test */
    public function options_can_be_passed()
    {
        $expected = <<<HTML
            <div x-data="
            { initMapbox: function () { mapboxgl.accessToken = 'testing'; var map = new mapboxgl.Map({&quot;container&quot;:&quot;custom-map&quot;,&quot;style&quot;:&quot;mapbox:\/\/styles\/mapbox\/streets-v11&quot;,&quot;zoom&quot;:0}); }
            }" x-init="initMapbox()" id="custom-map"></div>
            HTML;

        $this->assertComponentRenders($expected, '<x-mapbox id="custom-map" :options="[\'zoom\' => 0]"/>');
    }

    /** @test */
    public function markers_can_be_placed()
    {
        $expected = <<<HTML
            <div x-data="
            { initMapbox: function () { mapboxgl.accessToken = 'testing'; var map = new mapboxgl.Map({&quot;container&quot;:&quot;map&quot;,&quot;style&quot;:&quot;mapbox:\/\/styles\/mapbox\/streets-v11&quot;}); new mapboxgl.Marker() .setLngLat([13.41053,52.52437]) .addTo(map); }
            }" x-init="initMapbox()" id="map"></div>
            HTML;

        $this->assertComponentRenders($expected, '<x-mapbox :markers="[[13.4105300, 52.5243700]]"/>');
    }
}
