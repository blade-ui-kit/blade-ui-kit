<?php

declare(strict_types=1);

namespace Tests\Forms\Inputs;

use Tests\ComponentTestCase;

class PasswordTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<HTML
<input
    name="password"
    type="password"
    id="password"
    
/>
HTML;

        $this->assertComponentRenders($expected, '<x-input-password/>');
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
            '<x-input-password name="confirm_password" id="confirmPassword" class="p-4" />'
        );
    }

    /** @test */
    public function inputs_cannot_have_old_values()
    {
        $this->flashOld(['password' => 'secret']);

        $expected = <<<HTML
<input
    name="password"
    type="password"
    id="password"
    
/>
HTML;

        $this->assertComponentRenders($expected, '<x-input-password/>');
    }
}
