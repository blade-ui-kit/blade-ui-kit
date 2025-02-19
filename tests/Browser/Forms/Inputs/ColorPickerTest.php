<?php

declare(strict_types=1);

namespace Tests\Browser\Forms\Inputs;

use Laravel\Dusk\Browser;
use Tests\Browser\ComponentConfig;
use Tests\Browser\DuskTestCase;

// Note that we can't use pest-syntax here because it creates classes that wont exist in the dusk test environment 
// https://github.com/orchestral/testbench-dusk/issues/91#issuecomment-1884250004
class ColorPickerTest extends DuskTestCase
{
    public function test_it_can_render_color_picker_and_choose_color()
    {
        $this->browse(function (Browser $browser) {
            $inputElement = 'document.querySelector("#color1-input")';

            $browser->visit(
                $this->makeComponentRoute(
                    new ComponentConfig('color-picker', [
                        'name' => 'color1',
                        'dusk' => 'color1',
                    ])
                )
            )
            ->assertScript("return $inputElement.value === ''")
            ->click('@color1 button')
            ->waitFor('.pcr-palette')
            ->click('.pcr-palette')
            ->click('.pcr-save')
            ->waitUntil("$inputElement.value !== ''");
        });
    }
    
    public function test_it_can_render_multiple_color_pickers_and_choose_color()
    {
        $this->browse(function (Browser $browser) {
            $inputElement1 = 'document.querySelector("#color1-input")';
            $inputElement2 = 'document.querySelector("#color2-input")';

            $browser->visit(
                $this->makeComponentRoute([
                    new ComponentConfig('color-picker', [
                        'name' => 'color1',
                        'dusk' => 'color1',
                    ]),
                    new ComponentConfig('color-picker', [
                        'name' => 'color2',
                        'dusk' => 'color2',
                    ]),
                ])
            )
            ->assertScript("return $inputElement1.value === ''")
            ->click('@color1 button')
            ->waitFor('.pcr-app .pcr-palette')
            ->click('.pcr-app .pcr-palette')
            ->click('.pcr-app .pcr-save')
            ->waitUntil("$inputElement1.value !== ''")
            ->click('@color1 button')
            ->assertScript("return $inputElement2.value === ''")
            ->click('@color2 button')
            ->waitFor('.pcr-app:last-child .pcr-palette')
            ->click('.pcr-app:last-child .pcr-palette')
            ->click('.pcr-app:last-child .pcr-save')
            ->waitUntil("$inputElement2.value !== ''");
        });
    }
}
