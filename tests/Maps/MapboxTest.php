<?php

declare(strict_types=1);

namespace Tests\Maps;

use Tests\ComponentTestCase;

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
<div id="map" ></div>
<script>
    window.onload = function () {
        mapboxgl.accessToken = 'testing';
        var map = new mapboxgl.Map({"container":"map","style":"mapbox:\/\/styles\/mapbox\/streets-v11"});

            }
</script>
HTML;

        $this->assertComponentRenders($expected, '<x-mapbox/>');
    }

    /** @test */
    public function options_can_be_passed()
    {
        $expected = <<<HTML
<div id="custom-map" ></div>
<script>
    window.onload = function () {
        mapboxgl.accessToken = 'testing';
        var map = new mapboxgl.Map({"container":"custom-map","style":"mapbox:\/\/styles\/mapbox\/streets-v11","zoom":0});

            }
</script>
HTML;

        $this->assertComponentRenders($expected, '<x-mapbox id="custom-map" :options="[\'zoom\' => 0]"/>');
    }

    /** @test */
    public function markers_can_be_placed()
    {
        $expected = <<<HTML
<div id="map" ></div>
<script>
    window.onload = function () {
        mapboxgl.accessToken = 'testing';
        var map = new mapboxgl.Map({"container":"map","style":"mapbox:\/\/styles\/mapbox\/streets-v11"});

                    new mapboxgl.Marker()
                .setLngLat([13.41053,52.52437])
                .addTo(map);
            }
</script>
HTML;

        $this->assertComponentRenders($expected, '<x-mapbox :markers="[[13.4105300, 52.5243700]]"/>');
    }
}
