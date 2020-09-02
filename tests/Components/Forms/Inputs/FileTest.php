<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Tests\Components\ComponentTestCase;

class FileTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $this->assertComponentRenders(
            '<div>
                         <label for="file">
                            Choose File
                         </label>

                         <span id="chosenFile" class="">
                         </span>

                         <input type="file" name="file" id="file" style="display: none;">
                      </div>
',
            '<x-file/>'
        );
    }

    /** @test */
    public function specific_attributes_can_be_overwritten()
    {
        $this->assertComponentRenders(
            '<div>
                       <label for="file">
                          Choose Resume
                       </label>

                        <span id="chosenFile" class="">
                        </span>

                         <input type="file" name="user_resume" id="file" style="display: none;">
                    </div>',
            '<x-file name="user_resume" label="Choose Resume" />'
        );
    }
}
