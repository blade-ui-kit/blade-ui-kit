<?php

declare(strict_types=1);

namespace Tests\Browser\Forms\Inputs;

use BladeUIKit\Components\Forms\Inputs\ColorPicker;
use Laravel\Dusk\Browser;
use Tests\Browser\DuskTestCase;

// Note that we can't use pest-syntax here because it creates classes that wont exist in the dusk test environment 
// https://github.com/orchestral/testbench-dusk/issues/91#issuecomment-1884250004
class ColorPickerTest extends DuskTestCase
{
    /** @test */
    public function it_can_render_color_picker_and_choose_color() {
        $this->browse(function (Browser $browser) {
            $inputElement = 'document.querySelector("#color1-input")';
            $browser->visit($this->makeComponentRoute('color-picker', [
                'name' => 'color1',
                'dusk' => 'color1',
            ]))
            ->assertScript("return $inputElement.value === ''")
            ->click('@color1 button')
            ->waitFor('.pcr-palette')
            ->click('.pcr-palette')
            ->click('.pcr-save')
            ->waitUntil("$inputElement.value !== ''");
        });
    }
}