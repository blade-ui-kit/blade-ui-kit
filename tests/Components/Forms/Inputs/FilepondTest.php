<?php


namespace Tests\Components\Forms\Inputs;


use Tests\Components\ComponentTestCase;

class FilepondTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<HTML
<div x-data x-init=" FilePond.setOptions(JSON.parse('{}', function (key, value) { if (value && (typeof value === 'string') && (value.indexOf('function') === 0 || value.indexOf('(') === 0)) { return new Function('return ' + value)(); } return value; })); FilePond.create( \$refs.filepond ); ">
    <input type="file" x-ref="filepond">
</div>
HTML;

        $this->assertComponentRenders($expected, '<x-filepond />');
    }
}