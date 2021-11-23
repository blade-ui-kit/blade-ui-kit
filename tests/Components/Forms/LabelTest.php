<?php

declare(strict_types=1);

namespace Tests\Components\Forms;

use Tests\Components\ComponentTestCase;

class LabelTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<'HTML'
            <label for="first_name">
                First name
            </label>
            HTML;

        $this->assertComponentRenders($expected, '<x-label for="first_name"/>');
    }

    /** @test */
    public function the_component_can_be_rendered_with_arbitrary_slot()
    {
        $expected = <<<'HTML'
            <label for="first_name">
                Foo Name
            </label>
            HTML;

        $this->assertComponentRenders($expected, '<x-label for="first_name">Foo Name</x-label>');
    }
}
