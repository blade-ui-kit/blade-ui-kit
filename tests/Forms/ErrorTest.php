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

    /** @test */
    public function it_can_be_slotted()
    {
        $this->withViewErrors(['first_name' => 'Incorrect first name.']);

        $template = '
<x-error field="first_name" class="text-red-500">
    <div class="font-bold">
        <x-error field="first_name" />
    </div>
</x-error>';

        $expected = <<<HTML
<div class="text-red-500">
        <div class="font-bold">
         <div >
        Incorrect first name.
    </div>
 
    </div>
    </div>
HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
