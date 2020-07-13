<?php

declare(strict_types=1);

namespace Tests\Editors;

use Tests\ComponentTestCase;

class EasyMDETest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<HTML
<textarea name="about" id="about"></textarea>
<script>
    window.onload = function () {
        var easyMDE = new EasyMDE({
            element: document.getElementById("about")
        });
    }
</script>
HTML;

        $this->assertComponentRenders($expected, '<x-easy-mde name="about"/>');
    }

    /** @test */
    public function editor_can_have_old_values()
    {
        $this->flashOld(['about' => 'About me text']);

        $expected = <<<HTML
<textarea name="about" id="about">About me text</textarea>
<script>
    window.onload = function () {
        var easyMDE = new EasyMDE({
            element: document.getElementById("about")
        });
    }
</script>
HTML;

        $this->assertComponentRenders($expected, '<x-easy-mde name="about"/>');
    }

    /** @test */
    public function editor_can_have_options()
    {
        $expected = <<<HTML
<textarea name="about" id="about"></textarea>
<script>
    window.onload = function () {
        var easyMDE = new EasyMDE({
            element: document.getElementById("about"), ...{"minHeight":"500px"}
        });
    }
</script>
HTML;

        $this->assertComponentRenders($expected, '<x-easy-mde name="about" :options="[\'minHeight\' => \'500px\']"/>');
    }
}
