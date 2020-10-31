<?php

declare(strict_types=1);

namespace Tests\Components\Editors;

use Tests\Components\ComponentTestCase;

class TrixTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<'HTML'
            <div>
                <input name="about" id="about" value="" type="hidden">
                <trix-editor input="about" class="trix-content">
                </trix-editor>
            </div>
            HTML;

        $this->assertComponentRenders($expected, '<x-trix name="about"/>');
    }

    /** @test */
    public function editor_can_have_old_values()
    {
        $this->flashOld(['about' => 'About me text']);

        $expected = <<<'HTML'
            <div>
                <input name="about" id="about" value="About me text" type="hidden">
                <trix-editor input="about" class="trix-content">
                </trix-editor>
            </div>
            HTML;

        $this->assertComponentRenders($expected, '<x-trix name="about"/>');
    }
}
