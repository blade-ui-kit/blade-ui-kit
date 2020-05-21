<?php

declare(strict_types=1);

namespace Tests\Forms;

use Tests\ComponentTestCase;

class FormTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $template = <<<HTML
<x-form action="http://example.com">
    Form fields...
</x-form>
HTML;

        $expected = <<<HTML
<form method="POST" action="http://example.com" >
    <input type="hidden" name="_token" value="">    <input type="hidden" name="_method" value="POST">
    Form fields...
</form>
HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_method_can_be_set()
    {
        $template = <<<HTML
<x-form method="PUT" action="http://example.com">
    Form fields...
</x-form>
HTML;

        $expected = <<<HTML
<form method="PUT" action="http://example.com" >
    <input type="hidden" name="_token" value="">    <input type="hidden" name="_method" value="PUT">
    Form fields...
</form>
HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
