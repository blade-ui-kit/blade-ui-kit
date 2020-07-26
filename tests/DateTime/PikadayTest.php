<?php

declare(strict_types=1);

namespace Tests\DateTime;

use Tests\ComponentTestCase;

class PikadayTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<HTML
<input x-data="
{ initPikaday: function () { new Pikaday({ field: document.getElementById('birthday'), format: 'DD/MM/YYYY' }); }
}" x-init="initPikaday()" name="birthday" type="text" id="birthday" placeholder="DD/MM/YYYY" value="" />
HTML;

        $this->assertComponentRenders($expected, '<x-pikaday name="birthday"/>');
    }

    /** @test */
    public function pikaday_can_have_old_values()
    {
        $this->flashOld(['birthday' => '23/03/1989']);

        $expected = <<<HTML
<input x-data="
{ initPikaday: function () { new Pikaday({ field: document.getElementById('birthday'), format: 'DD/MM/YYYY' }); }
}" x-init="initPikaday()" name="birthday" type="text" id="birthday" placeholder="DD/MM/YYYY" value="23/03/1989" />
HTML;

        $this->assertComponentRenders($expected, '<x-pikaday name="birthday"/>');
    }
}
