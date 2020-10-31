<?php

declare(strict_types=1);

namespace Tests\Components\Forms;

use Tests\Components\ComponentTestCase;

class FormTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $template = <<<'HTML'
            <x-form action="http://example.com">
                Form fields...
            </x-form>
            HTML;

        $expected = <<<'HTML'
            <form method="POST" action="http://example.com">
                <input type="hidden" name="_token" value="">
                <input type="hidden" name="_method" value="POST">
                Form fields...

            </form>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_method_can_be_set()
    {
        $template = <<<'HTML'
            <x-form method="PUT" action="http://example.com">
                Form fields...
            </x-form>
            HTML;

        $expected = <<<'HTML'
            <form method="POST" action="http://example.com">
                <input type="hidden" name="_token" value="">
                <input type="hidden" name="_method" value="PUT">
                Form fields...

            </form>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function it_can_enable_file_uploads()
    {
        $template = <<<'HTML'
            <x-form method="PUT" action="http://example.com" has-files>
                Form fields...
            </x-form>
            HTML;

        $expected = <<<'HTML'
            <form method="POST" action="http://example.com" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="">
                <input type="hidden" name="_method" value="PUT">
                Form fields...

            </form>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
