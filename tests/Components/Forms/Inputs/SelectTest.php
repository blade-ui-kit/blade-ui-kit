<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Tests\Components\ComponentTestCase;

class SelectTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $template = <<<HTML
<select name="select" id="select">
    <option value="0">Test</option>
</select>
HTML;
        $this->assertComponentRenders(
            $template,
            '<x-select name="select" :options="[\'Test\']" />'
        );
    }

    /** @test */
    public function selected_attribute_test()
    {
        $template = <<<HTML
<select name="select" id="select">
    <option value="test">Test</option>
    <option value="test2" selected>Test2</option>
</select>
HTML;
        $this->assertComponentRenders(
            $template,
            '<x-select name="select" :options="[\'test\' => \'Test\', \'test2\' => \'Test2\']" selected="test2" />'
        );
    }

    /** @test */
    public function specific_attributes_can_be_overwritten()
    {
        $template = <<<HTML
<select name="select" id="select" class="p-4">
    <option value="0">Test</option>
</select>
HTML;
        $this->assertComponentRenders(
            $template,
            '<x-select name="select" :options="[\'Test\']" class="p-4" />'
        );
    }

    public function placeholder_attribute_test()
    {
        $template = <<<HTML
<select name="select" id="select">
    <option value="" hidden>Placeholder</option>
    <option value="0">Test</option>
</select>
HTML;
        $this->assertComponentRenders(
            $template,
            '<x-select name="select" :options="[\'Test\']" placeholder="Placeholder" />'
        );
    }

    /** @test */
    public function inputs_can_have_old_values()
    {
        $this->flashOld(['select' => 'test2']);

        $template = <<<HTML
<select name="select" id="select">
    <option value="test">Test</option>
    <option value="test2" selected>Test2</option>
</select>
HTML;

        $this->assertComponentRenders(
            $template,
            '<x-select name="select" :options="[\'test\' => \'Test\', \'test2\' => \'Test2\']" />'
        );
    }
}
