<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Tests\Components\ComponentTestCase;

class TextareaTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $this->assertComponentRenders(
            '<textarea name="about" id="about" rows="3"></textarea>',
            '<x-textarea name="about"/>',
        );
    }

    /** @test */
    public function specific_attributes_can_be_overwritten()
    {
        $this->assertComponentRenders(
            '<textarea name="about" id="aboutMe" rows="5" cols="8" class="p-4">About me text</textarea>',
            '<x-textarea name="about" id="aboutMe" rows="5" cols="8" class="p-4">About me text</x-textarea>',
        );
    }

    /** @test */
    public function inputs_can_have_old_values()
    {
        $this->flashOld(['about' => 'About me text']);

        $this->assertComponentRenders(
            '<textarea name="about" id="about" rows="3">About me text</textarea>',
            '<x-textarea name="about"/>',
        );
    }
}
