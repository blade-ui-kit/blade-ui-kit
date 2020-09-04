<?php

declare(strict_types=1);

namespace Tests\Components\Maps;

use Tests\Components\ComponentTestCase;

class GoogleMapCircleTest extends ComponentTestCase
{
    protected function getEnvironmentSetUp($app): void
    {
        parent::getEnvironmentSetUp($app);
    }

    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<HTML
var marker = new google.maps.Circle({ center: {&quot;lat&quot;:13.762936,&quot;lng&quot;:-1.390915}, map: map, strokeColor: '#E02424', strokeOpacity: 1, strokeWeight: 1, fillColor: '#E02424', fillOpacity: 0.1, radius: 1609.3 * 10, })
HTML;

        $this->assertComponentRenders($expected, '<x-google-map-circle :center="[13.762936, -1.390915]" />');
    }

    /** @test */
    public function defaults_can_be_overridden()
    {
        $expected = <<<HTML
var marker = new google.maps.Circle({ center: {&quot;lat&quot;:13.762936,&quot;lng&quot;:-1.390915}, map: map, strokeColor: '#123456', strokeOpacity: 1, strokeWeight: 1, fillColor: '#123456', fillOpacity: 0.1, radius: 1609.3 * 100, })
HTML;

        $this->assertComponentRenders($expected, '<x-google-map-circle :center="[13.762936, -1.390915]" radius="100" colour="#123456" />');
    }

    /** @test */
    public function options_can_be_passed()
    {
        $expected = <<<HTML
var marker = new google.maps.Circle({ center: {&quot;lat&quot;:13.762936,&quot;lng&quot;:-1.390915}, map: map, strokeColor: '#E02424', strokeOpacity: 1, strokeWeight: 1, fillColor: '#E02424', fillOpacity: 0.1, radius: 1609.3 * 10, &quot;draggable&quot;: true, })
HTML;

        $this->assertComponentRenders($expected, '<x-google-map-circle :center="[13.762936, -1.390915]" draggable />');
    }
}
