<?php

declare(strict_types=1);

namespace Tests\Forms\Inputs;

use Tests\ComponentTestCase;

class EmailTest extends ComponentTestCase
{
    /** @test */
    public function its_component_can_be_rendered()
    {
        $expected = <<<HTML
<input
    name="email"
    type="email"
    id="email"
        
/>
HTML;

        $this->assertComponentRenders($expected, '<x-input-email/>');
    }

    /** @test */
    public function specific_attributes_can_be_overwritten()
    {
        $expected = <<<HTML
<input
    name="email_address"
    type="email"
    id="emailAddress"
        class="p-4"
/>
HTML;

        $this->assertComponentRenders(
            $expected,
            '<x-input-email name="email_address" id="emailAddress" class="p-4" />'
        );
    }

    /** @test */
    public function inputs_can_have_old_values()
    {
        $this->flashOld(['email' => 'Eloquent']);

        $expected = <<<HTML
<input
    name="email"
    type="email"
    id="email"
    value="Eloquent"    
/>
HTML;

        $this->assertComponentRenders($expected, '<x-input-email/>');
    }
}
