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
    /** @test */
    public function it_can_render_color_picker_and_choose_color() {
        $this->browse(function (Browser $browser) {
            $inputElement = 'document.querySelector("#color1-input")';

            $browser->visit(
                $this->makeComponentRoute(
                    new ComponentConfig('color-picker', [
                        'name' => 'color1',
                        'dusk' => 'color1',
                        'x-on:buk:color-save' => 'window.test_render = `1 ${$event.detail.color}`',
                    ])
                )
            )
            ->assertScript("return $inputElement.value === ''")
            ->click('@color1 button')
            ->waitFor('.pcr-palette')
            ->click('.pcr-palette')
            ->click('.pcr-save')
            ->waitUntil("$inputElement.value !== ''")
            ->assertScript('return window.test_render === `1 ${' . $inputElement . '.value}`');
        });
    }
    
    /** @test */
    public function it_can_render_multiple_color_pickers_and_choose_color() {
        $this->browse(function (Browser $browser) {
            $inputElement1 = 'document.querySelector("#color1-input")';
            $inputElement2 = 'document.querySelector("#color2-input")';

            $browser->visit(
                $this->makeComponentRoute([
                    new ComponentConfig('color-picker', [
                        'name' => 'color1',
                        'dusk' => 'color1',
                        '@buk:color-change' => 'window.test_render_multiple1 = `1 ${$event.detail.color}`',
                    ]),
                    new ComponentConfig('color-picker', [
                        'name' => 'color2',
                        'dusk' => 'color2',
                        '@buk:color-change' => 'window.test_render_multiple2 = `2 ${$event.detail.color}`',
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
            ->assertScript('return window.test_render_multiple1 === `1 ${' . $inputElement1 . '.value}`')
            ->assertScript('return window.test_render_multiple2 === undefined')
            ->assertScript("return $inputElement2.value === ''")
            ->click('@color2 button')
            ->waitFor('.pcr-app:last-child .pcr-palette')
            ->click('.pcr-app:last-child .pcr-palette')
            ->click('.pcr-app:last-child .pcr-save')
            ->waitUntil("$inputElement2.value !== ''")
            ->assertScript('return window.test_render_multiple2 === `2 ${' . $inputElement2 . '.value}`');
        });
    }
}
