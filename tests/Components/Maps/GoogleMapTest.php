<?php

declare(strict_types=1);

namespace Tests\Components\Maps;

use Tests\Components\ComponentTestCase;

class GoogleMapTest extends ComponentTestCase
{
    protected function getEnvironmentSetUp($app): void
    {
        parent::getEnvironmentSetUp($app);
    }

    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<HTML
<div style="height:-webkit-fill-available" x-data="{ initGoogleMap: function () { var el = document.getElementById('map') var map = new google.maps.Map(el, {&quot;center&quot;:{&quot;lat&quot;:33.7633864,&quot;lng&quot;:-84.3973038},&quot;zoom&quot;:15}); } }" x-init="() =>
    initGoogleMap()" id="map"></div>
HTML;

        $this->assertComponentRenders($expected, '<x-google-map/>');
    }

    /** @test */
    public function options_can_be_passed()
    {
        $expected = <<<HTML
<div style="height:-webkit-fill-available" x-data="{ initGoogleMap: function () { var el = document.getElementById('custom-map') var map = new google.maps.Map(el, {&quot;center&quot;:{&quot;lat&quot;:33.7633864,&quot;lng&quot;:-84.3973038},&quot;zoom&quot;:0}); } }" x-init="() =>
    initGoogleMap()" id="custom-map"></div>
HTML;

        $this->assertComponentRenders($expected, '<x-google-map id="custom-map" :options="[\'zoom\' => 0]"/>');
    }

    /** @test */
    public function markers_can_be_placed()
    {
        $expected = <<<HTML
<div style="height:-webkit-fill-available" x-data="{ initGoogleMap: function () { var el = document.getElementById('map') var map = new google.maps.Map(el, {&quot;center&quot;:{&quot;lat&quot;:33.7633864,&quot;lng&quot;:-84.3973038},&quot;zoom&quot;:15}); var marker = new google.maps.Marker({position: {&quot;lat&quot;:13.41053,&quot;lng&quot;:52.52437}, map: map}); } }" x-init="() =>
    initGoogleMap()" id="map"></div>
HTML;

        $this->assertComponentRenders($expected, '<x-google-map :markers="[[13.4105300, 52.5243700]]"/>');
    }
}
