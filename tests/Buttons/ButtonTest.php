<?php

declare(strict_types=1);

namespace Tests\Forms;

use Tests\ComponentTestCase;

class ButtonTest extends ComponentTestCase
{
    /** @test */
    public function its_component_can_be_rendered()
    {
        $expected = <<<HTML
<button type="button" >
    Click me
</button>
HTML;

        $this->assertComponentRenders($expected, '<x-button>Click me</x-button>');
    }

    /** @test */
    public function it_can_have_a_specific_type()
    {
        $expected = <<<HTML
<button type="submit" >
    Click me
</button>
HTML;

        $this->assertComponentRenders($expected, '<x-button type="submit">Click me</x-button>');
    }
}
