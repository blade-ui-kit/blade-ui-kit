<?php

declare(strict_types=1);

namespace Tests\Components\Maps;

use Tests\Components\ComponentTestCase;

class GoogleMapMarkerTest extends ComponentTestCase
{
    protected function getEnvironmentSetUp($app): void
    {
        parent::getEnvironmentSetUp($app);
    }

    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<HTML
var marker = new google.maps.Marker({ position: {&quot;lat&quot;:13.762936,&quot;lng&quot;:-1.390915}, map: map, })
HTML;

        $this->assertComponentRenders($expected, '<x-google-map-marker :position="[13.762936, -1.390915]"/>');
    }

    /** @test */
    public function options_can_be_passed()
    {
        $expected = <<<HTML
var marker = new google.maps.Marker({ position: {&quot;lat&quot;:13.762936,&quot;lng&quot;:-1.390915}, map: map, &quot;label&quot;: &quot;Not Laracon&quot;, })
HTML;

        $this->assertComponentRenders($expected, '<x-google-map-marker :position="[13.762936, -1.390915]" label="Not Laracon"/>');
    }
}
