<?php

declare(strict_types=1);

namespace Tests\Components\Forms;

use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class FormTest extends ComponentTestCase
{
    #[Test]
    public function the_component_can_be_rendered()
    {
        $template = <<<'HTML'
            <x-form action="http://example.com">
                Form fields...
            </x-form>
            HTML;

        $expected = <<<'HTML'
            <form method="POST" action="http://example.com">
                <input type="hidden" name="_token" value="" autocomplete="off">
                <input type="hidden" name="_method" value="POST">
                Form fields...

            </form>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_method_can_be_set()
    {
        $template = <<<'HTML'
            <x-form method="PUT" action="http://example.com">
                Form fields...
            </x-form>
            HTML;

        $expected = <<<'HTML'
            <form method="POST" action="http://example.com">
                <input type="hidden" name="_token" value="" autocomplete="off">
                <input type="hidden" name="_method" value="PUT">
                Form fields...

            </form>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function it_can_enable_file_uploads()
    {
        $template = <<<'HTML'
            <x-form method="PUT" action="http://example.com" has-files>
                Form fields...
            </x-form>
            HTML;

        $expected = <<<'HTML'
            <form method="POST" action="http://example.com" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="" autocomplete="off">
                <input type="hidden" name="_method" value="PUT">
                Form fields...

            </form>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_action_prop_is_optional()
    {
        $template = <<<'HTML'
            <x-form method="POST">
                Form fields...
            </x-form>
            HTML;

        $expected = <<<'HTML'
            <form method="POST">
                <input type="hidden" name="_token" value="" autocomplete="off">
                <input type="hidden" name="_method" value="POST">
                Form fields...

            </form>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
