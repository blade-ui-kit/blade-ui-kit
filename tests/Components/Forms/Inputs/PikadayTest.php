<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Tests\Components\ComponentTestCase;

class PikadayTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<HTML
            <input x-data x-init="new Pikaday({ field: \$el , ...{&quot;format&quot;:&quot;DD\/MM\/YYYY&quot;} })" name="birthday" type="text" id="birthday" placeholder="DD/MM/YYYY" />
            HTML;

        $this->assertComponentRenders($expected, '<x-pikaday name="birthday"/>');
    }

    /** @test */
    public function pikaday_can_have_old_values()
    {
        $this->flashOld(['birthday' => '23/03/1989']);

        $expected = <<<HTML
            <input x-data x-init="new Pikaday({ field: \$el , ...{&quot;format&quot;:&quot;DD\/MM\/YYYY&quot;} })" name="birthday" type="text" id="birthday" placeholder="DD/MM/YYYY" value="23/03/1989" />
            HTML;

        $this->assertComponentRenders($expected, '<x-pikaday name="birthday"/>');
    }
}
