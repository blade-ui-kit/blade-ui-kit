<?php

declare(strict_types=1);

namespace Tests\Forms;

use Tests\ComponentTestCase;

class ErrorTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $this->withViewErrors(['first_name' => 'Incorrect first name.']);

        $expected = <<<HTML
<div class="text-red-500">
        Incorrect first name.
    </div>
HTML;

        $this->assertComponentRenders($expected, '<x-error field="first_name" class="text-red-500"/>');
    }
}
