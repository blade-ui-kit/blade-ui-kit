<?php

declare(strict_types=1);

namespace Tests\Components\Forms;

use Tests\Components\ComponentTestCase;

class ErrorTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $this->withViewErrors(['first_name' => 'Incorrect first name.']);

        $expected = <<<'HTML'
            <div class="text-red-500">
                Incorrect first name.
            </div>
            HTML;

        $this->assertComponentRenders($expected, '<x-error field="first_name" class="text-red-500"/>');
    }

    /** @test */
    public function it_can_be_slotted()
    {
        $this->withViewErrors(['first_name' => ['Incorrect first name.', 'Needs at least 5 characters.']]);

        $template = <<<'HTML'
            <x-error field="first_name">
                <ul>
                    @foreach ($component->messages($errors) as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-error>
            HTML;

        $expected = <<<'HTML'
            <div>
                <ul>
                    <li>Incorrect first name.</li>
                    <li>Needs at least 5 characters.</li>
                </ul>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
