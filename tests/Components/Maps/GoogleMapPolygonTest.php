<?php

declare(strict_types=1);

namespace Tests\Components\Maps;

use Tests\Components\ComponentTestCase;

class GoogleMapPolygonTest extends ComponentTestCase
{
    protected function getEnvironmentSetUp($app): void
    {
        parent::getEnvironmentSetUp($app);
    }

    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<HTML
var marker = new google.maps.Polygon({ paths: [{&quot;lat&quot;:25.774,&quot;lng&quot;:-80.19},{&quot;lat&quot;:18.466,&quot;lng&quot;:-66.118},{&quot;lat&quot;:32.321,&quot;lng&quot;:-64.757},{&quot;lat&quot;:25.774,&quot;lng&quot;:-80.19}], map: map, strokeColor: '#E02424', strokeOpacity: 1, strokeWeight: 1, fillColor: '#E02424', fillOpacity: 0.1, })
HTML;

        $this->assertComponentRenders($expected, '<x-google-map-polygon :path="[
            [25.774, -80.19],
            [18.466, -66.118],
            [32.321, -64.757],
            [25.774, -80.19],
        ]" />');
    }

    /** @test */
    public function defaults_can_be_overridden()
    {
        $expected = <<<HTML
var marker = new google.maps.Polygon({ paths: [{&quot;lat&quot;:25.774,&quot;lng&quot;:-80.19},{&quot;lat&quot;:18.466,&quot;lng&quot;:-66.118},{&quot;lat&quot;:32.321,&quot;lng&quot;:-64.757},{&quot;lat&quot;:25.774,&quot;lng&quot;:-80.19}], map: map, strokeColor: '#123456', strokeOpacity: 1, strokeWeight: 1, fillColor: '#123456', fillOpacity: 0.1, })
HTML;

        $this->assertComponentRenders($expected, '<x-google-map-polygon :path="[
            [25.774, -80.19],
            [18.466, -66.118],
            [32.321, -64.757],
            [25.774, -80.19],
        ]" colour="#123456" />');
    }

    /** @test */
    public function options_can_be_passed()
    {
        $expected = <<<HTML
var marker = new google.maps.Polygon({ paths: [{&quot;lat&quot;:25.774,&quot;lng&quot;:-80.19},{&quot;lat&quot;:18.466,&quot;lng&quot;:-66.118},{&quot;lat&quot;:32.321,&quot;lng&quot;:-64.757},{&quot;lat&quot;:25.774,&quot;lng&quot;:-80.19}], map: map, strokeColor: '#E02424', strokeOpacity: 1, strokeWeight: 1, fillColor: '#E02424', fillOpacity: 0.1, &quot;editable&quot;: true, })
HTML;

        $this->assertComponentRenders($expected, '<x-google-map-polygon :path="[
            [25.774, -80.19],
            [18.466, -66.118],
            [32.321, -64.757],
            [25.774, -80.19],
        ]" editable />');
    }
}
