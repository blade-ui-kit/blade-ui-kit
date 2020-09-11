<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Tests\Components\ComponentTestCase;

class FlatpickrTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<HTML
<input x-data="{ initFlatpickr: function () { flatpickr('#birthday', {&quot;dateFormat&quot;:&quot;d-m-Y&quot;,&quot;enableTime&quot;:false}); } }" x-init="initFlatpickr()" name="birthday" type="text" id="birthday" placeholder="d-m-Y" />
HTML;

        $this->assertComponentRenders($expected, '<x-flatpickr name="birthday"/>');
    }

    /** @test */
    public function flatpickr_can_have_old_values()
    {
        $this->flashOld(['birthday' => '23-03-1989']);

        $expected = <<<HTML
<input x-data="{ initFlatpickr: function () { flatpickr('#birthday', {&quot;dateFormat&quot;:&quot;d-m-Y&quot;,&quot;enableTime&quot;:false}); } }" x-init="initFlatpickr()" name="birthday" type="text" id="birthday" placeholder="d-m-Y" value="23-03-1989" />
HTML;

        $this->assertComponentRenders($expected, '<x-flatpickr name="birthday"/>');
    }

    /** @test */
    public function flatpickr_can_have_time()
    {
        $expected = <<<HTML
<input x-data="{ initFlatpickr: function () { flatpickr('#birthday', {&quot;dateFormat&quot;:&quot;d-m-Y H:i&quot;,&quot;enableTime&quot;:true}); } }" x-init="initFlatpickr()" name="birthday" type="text" id="birthday" placeholder="d-m-Y H:i" />
HTML;

        $this->assertComponentRenders($expected, '<x-flatpickr name="birthday" enableTime />');
    }
}
