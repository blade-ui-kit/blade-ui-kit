<?php

declare(strict_types=1);

namespace Tests\Forms\Inputs;

use Tests\ComponentTestCase;

class InputTest extends ComponentTestCase
{
    /** @test */
    public function its_component_can_be_rendered()
    {
        $expected = <<<HTML
<input
    name="search"
    type="text"
    id="search"
    
/>
HTML;

        $this->assertComponentRenders($expected, '<x-input name="search"/>');
    }

    /** @test */
    public function specific_attributes_can_be_overwritten()
    {
        $expected = <<<HTML
<input
    name="confirm_password"
    type="password"
    id="confirmPassword"
    class="p-4"
/>
HTML;

        $this->assertComponentRenders(
            $expected,
            '<x-input name="confirm_password" id="confirmPassword" type="password" class="p-4" />'
        );
    }
}
