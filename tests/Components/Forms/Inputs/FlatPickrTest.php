<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class FlatPickrTest extends ComponentTestCase
{
    #[Test]
    public function the_component_can_be_rendered()
    {
        $expected = <<<'HTML'
            <input x-data="{ picker: null, initPicker() { if (this.picker) return; this.picker = flatpickr(this.$el, {&quot;dateFormat&quot;:&quot;Y-m-d H:i&quot;,&quot;altInput&quot;:true,&quot;enableTime&quot;:true}); } }" x-on:mouseenter="initPicker()" name="birthday" type="text" id="birthday" placeholder="Y-m-d H:i" />
            HTML;

        $this->assertComponentRenders($expected, '<x-flat-pickr name="birthday"/>');
    }

    #[Test]
    public function flatpickr_can_have_old_values()
    {
        $this->flashOld(['birthday' => '23/03/1989']);

        $expected = <<<'HTML'
            <input x-data="{ picker: null, initPicker() { if (this.picker) return; this.picker = flatpickr(this.$el, {&quot;dateFormat&quot;:&quot;Y-m-d H:i&quot;,&quot;altInput&quot;:true,&quot;enableTime&quot;:true}); } }" x-on:mouseenter="initPicker()" name="birthday" type="text" id="birthday" placeholder="Y-m-d H:i" value="23/03/1989" />
            HTML;

        $this->assertComponentRenders($expected, '<x-flat-pickr name="birthday"/>');
    }
}
