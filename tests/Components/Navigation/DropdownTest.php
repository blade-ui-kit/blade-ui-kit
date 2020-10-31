<?php

declare(strict_types=1);

namespace Tests\Components\Navigation;

use Tests\Components\ComponentTestCase;

class DropdownTest extends ComponentTestCase
{
    /** @test */
    public function it_can_render()
    {
        $template = <<<'HTML'
            <x-dropdown class="text-gray-500">
                <x-slot name="trigger">
                    <button>Dries</button>
                </x-slot>

                <a href="#">Profile</a>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
            </x-html>
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ open: false }" @click.away="open = false" class="text-gray-500">
                <div @click="open = ! open">
                    <button>Dries</button>
               
            </div>
                <div x-show="open">
                <a href="#">Profile</a>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
            </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
