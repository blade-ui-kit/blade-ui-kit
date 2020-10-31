<?php

declare(strict_types=1);

namespace Tests\Components\Editors;

use Tests\Components\ComponentTestCase;

class EasyMDETest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<'HTML'
            <textarea x-data x-init="new EasyMDE({ element: $el , ...{&quot;forceSync&quot;:true} })" name="about" id="about"></textarea>
            HTML;

        $this->assertComponentRenders($expected, '<x-easy-mde name="about"/>');
    }

    /** @test */
    public function editor_can_have_old_values()
    {
        $this->flashOld(['about' => 'About me text']);

        $expected = <<<'HTML'
            <textarea x-data x-init="new EasyMDE({ element: $el , ...{&quot;forceSync&quot;:true} })" name="about" id="about">About me text</textarea>
            HTML;

        $this->assertComponentRenders($expected, '<x-easy-mde name="about"/>');
    }

    /** @test */
    public function editor_can_have_options()
    {
        $this->assertComponentRenders(
            '<textarea x-data x-init="new EasyMDE({ element: $el , ...{&quot;forceSync&quot;:true,&quot;minHeight&quot;:&quot;500px&quot;} })" name="about" id="about"></textarea>',
            '<x-easy-mde name="about" :options="[\'minHeight\' => \'500px\']"/>'
        );
    }
}
