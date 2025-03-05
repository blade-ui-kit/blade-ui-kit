<?php

declare(strict_types=1);

namespace Tests\Components\Layouts;

use Tests\Components\ComponentTestCase;

class BannerTest extends ComponentTestCase
{
    /** @test */
    public function it_can_render_to_html()
    {
        $template = <<<HTML
<x-banner>
    <p>something to say</p>
    <x-slot name="trigger">
        <button type="button">Dismiss</button>
    </x-slot>
</x-banner>
HTML;

        $expected = <<<HTML
<div x-data="{ dismiss: false }" x-show="dismiss === false && sessionStorage.getItem('blade-ui-kit-banner-dismiss') !== '1'">
    <p>something to say</p>
    <div @click="dismiss = true; sessionStorage.setItem('blade-ui-kit-banner-dismiss', '1')" aria-label="Dismiss">
        <button type="button">Dismiss</button>
   
</div>
</div>
HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function it_can_render_to_html_with_custom_class_on_trigger_slot()
    {
        $template = <<<HTML
<x-banner trigger-class="fixed">
    <p>something to say</p>
    <x-slot name="trigger">
        <button type="button">Dismiss</button>
    </x-slot>
</x-banner>
HTML;

        $expected = <<<HTML
<div x-data="{ dismiss: false }" x-show="dismiss === false && sessionStorage.getItem('blade-ui-kit-banner-dismiss') !== '1'">
    <p>something to say</p>
    <div class="fixed" @click="dismiss = true; sessionStorage.setItem('blade-ui-kit-banner-dismiss', '1')" aria-label="Dismiss">
        <button type="button">Dismiss</button>
   
</div>
</div>
HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
