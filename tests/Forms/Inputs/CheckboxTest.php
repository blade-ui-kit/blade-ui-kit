<?php

declare(strict_types=1);

namespace Tests\Forms\Inputs;

use Tests\ComponentTestCase;

class CheckboxTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<HTML
<input
    name="remember_me"
    type="checkbox"
    id="remember_me"
    
    
/>
HTML;

        $this->assertComponentRenders($expected, '<x-checkbox name="remember_me"/>');
    }

    /** @test */
    public function specific_attributes_can_be_overwritten()
    {
        $expected = <<<HTML
<input
    name="remember_me"
    type="checkbox"
    id="rememberMe"
    
    class="p-4"
/>
HTML;

        $this->assertComponentRenders(
            $expected,
            '<x-checkbox name="remember_me" id="rememberMe" class="p-4" />'
        );
    }

    /** @test */
    public function inputs_can_have_old_values()
    {
        $this->flashOld(['remember_me' => true]);

        $expected = <<<HTML
<input
    name="remember_me"
    type="checkbox"
    id="remember_me"
    checked
    
/>
HTML;

        $this->assertComponentRenders($expected, '<x-checkbox name="remember_me"/>');
    }
}
