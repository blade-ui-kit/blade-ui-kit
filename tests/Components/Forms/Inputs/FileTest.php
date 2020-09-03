<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Tests\Components\ComponentTestCase;

class FileTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {

        $expected = <<<HTML
<div>
    <label for="file" class="default">
    Choose File </label>
    <span id="chosenFile" class="">
    </span>
    
    <input type="file" name="file" id="file" style="display: none;">
</div>
<style>
     .default {
        padding: .5rem;
        border-radius: 5px;
    }

    .default:hover {
        color: #718096;
    }
</style>
<script>
    document.getElementById('file').onchange = function () {
        document.getElementById('chosenFile').innerHTML = this.files[0].name;
    };
</script>
HTML;


        $this->assertComponentRenders(
            $expected,
            '<x-file/>'
        );
    }

    /** @test */
    public function specific_attributes_can_be_overwritten()
    {
        $expected = <<<HTML
<div>
    <label for="file" class="default">
    Choose Resume </label>
    <span id="chosenFile" class="">
    </span>
    
    <input type="file" name="user_resume" id="file" style="display: none;">
</div>
<style>
    .default {
        padding: .5rem;
        border-radius: 5px;
    }

    .default:hover {
        color: #718096;
    }
</style>
<script>
    document.getElementById('file').onchange = function () {
        document.getElementById('chosenFile').innerHTML = this.files[0].name;
    };
</script>
HTML;


        $this->assertComponentRenders(
            $expected,
            '<x-file name="user_resume" label="Choose Resume" />'
        );
    }
}
