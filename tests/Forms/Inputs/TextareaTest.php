<?php

declare(strict_types=1);

namespace Tests\Forms\Inputs;

use Tests\ComponentTestCase;

class TextareaTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<HTML
<textarea
    name="about"
    id="about"
    rows="3"
    
></textarea>
HTML;

        $this->assertComponentRenders($expected, '<x-textarea name="about"/>');
    }

    /** @test */
    public function specific_attributes_can_be_overwritten()
    {
        $expected = <<<HTML
<textarea
    name="about"
    id="aboutMe"
    rows="5"
    cols="8" class="p-4"
></textarea>
HTML;

        $this->assertComponentRenders(
            $expected,
            '<x-textarea name="about" id="aboutMe" rows="5" cols="8" class="p-4" />'
        );
    }

    /** @test */
    public function inputs_can_have_old_values()
    {
        $this->flashOld(['search' => 'Eloquent']);

        $expected = <<<HTML
<textarea
    name="about"
    id="about"
    rows="3"
    
>About me text</textarea>
HTML;

        $this->assertComponentRenders($expected, '<x-textarea name="about">About me text</x-textarea>');
    }
}
