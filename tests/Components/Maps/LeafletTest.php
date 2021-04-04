<?php

declare(strict_types=1);

namespace Tests\Components\Maps;

use Tests\Components\ComponentTestCase;

class LeafletTest extends ComponentTestCase
{
    protected function getEnvironmentSetUp($app): void
    {
        parent::getEnvironmentSetUp($app);
    }

    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<HTML
<div x-data="
{ initLeaflet: function () { var map = L.map('map', {&quot;center&quot;:[0,0],&quot;zoom&quot;:8,&quot;zoomControl&quot;:false} ); L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map); }
}" x-init="initLeaflet()" id="map"></div>
HTML;
        $this->assertComponentRenders($expected, '<x-leaflet/>');
    }

    /** @test */
    public function basemap_can_be_passed()
    {
        $expected = <<<HTML
<div x-data="
{ initLeaflet: function () { var map = L.map('map', {&quot;center&quot;:[0,0],&quot;zoom&quot;:8,&quot;zoomControl&quot;:false} ); L.tileLayer('//{s}.tile.stamen.com/watercolor/{z}/{x}/{y}.png').addTo(map); }
}" x-init="initLeaflet()" id="map"></div>
HTML;
        $this->assertComponentRenders($expected, '<x-leaflet basemap="watercolor" />');
    }

    /** @test */
    public function center_can_be_passed()
    {
        $expected = <<<HTML
<div x-data="
{ initLeaflet: function () { var map = L.map('map', {&quot;center&quot;:[52.1234,13.1234],&quot;zoom&quot;:8,&quot;zoomControl&quot;:false} ); L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map); }
}" x-init="initLeaflet()" id="map"></div>
HTML;
        $this->assertComponentRenders($expected, '<x-leaflet :center="[13.1234, 52.1234]" />');
    }

    /** @test */
    public function zoom_can_be_passed()
    {
        $expected = <<<HTML
<div x-data="
{ initLeaflet: function () { var map = L.map('map', {&quot;center&quot;:[0,0],&quot;zoom&quot;:10,&quot;zoomControl&quot;:false} ); L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map); }
}" x-init="initLeaflet()" id="map"></div>
HTML;
        $this->assertComponentRenders($expected, '<x-leaflet :zoom="10" />');
    }

    /** @test */
    public function zoomControl_can_be_set()
    {
        $expected = <<<HTML
<div x-data="
{ initLeaflet: function () { var map = L.map('map', {&quot;center&quot;:[0,0],&quot;zoom&quot;:8,&quot;zoomControl&quot;:true} ); L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map); }
}" x-init="initLeaflet()" id="map"></div>
HTML;
        $this->assertComponentRenders($expected, '<x-leaflet :zoomControl="true" />');
    }

    /** @test */
    public function markers_can_be_placed()
    {
        $expected = <<<HTML
<div x-data="
{ initLeaflet: function () { var map = L.map('map', {&quot;center&quot;:[0,0],&quot;zoom&quot;:8,&quot;zoomControl&quot;:false} ); L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map); L.marker([52.52437,13.41053]).addTo(map); L.marker([48.85341,2.3488]).addTo(map); }
}" x-init="initLeaflet()" id="map"></div>
HTML;
        $this->assertComponentRenders($expected, '<x-leaflet :markers="[[13.4105300, 52.5243700], [2.3488000, 48.8534100]]" />');
    }
}
