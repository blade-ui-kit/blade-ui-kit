<?php
  
declare(strict_types=1);

test('the component can be rendered', function () {
    $template = <<<'HTML'
            <x-color-picker name="color" />
            HTML;

    expect(blade($template))->toMatchSnapshot();
});
        $expected = <<<'HTML'
            <div x-data="{ initPickr: function (element) { let pickr = Pickr.create({&quot;el&quot;:&quot;#color&quot;,&quot;default&quot;:&quot;&quot;,&quot;theme&quot;:&quot;classic&quot;,&quot;swatches&quot;:[&quot;000000&quot;,&quot;A0AEC0&quot;,&quot;F56565&quot;,&quot;ED8936&quot;,&quot;ECC94B&quot;,&quot;48BB78&quot;,&quot;38B2AC&quot;,&quot;4299E1&quot;,&quot;667EEA&quot;,&quot;9F7AEA&quot;,&quot;ED64A6&quot;,&quot;FFFFFF&quot;],&quot;components&quot;:{&quot;preview&quot;:true,&quot;interaction&quot;:{&quot;hex&quot;:true,&quot;input&quot;:true,&quot;clear&quot;:true,&quot;save&quot;:true}}}); let input = document.getElementById('color-input'); pickr.on('save', function (color) { let currentColor = color ? color.toHEXA().toString() : ''; $dispatch('input', currentColor); input.setAttribute('value', currentColor); element.setAttribute('title', currentColor); }); pickr.on('change', function (color) { let currentColor = color ? color.toHEXA().toString() : ''; $dispatch('change', currentColor); }); } }" x-init="initPickr($el)" title="">
                <div id="color"></div>
                <input id="color-input" name="color" type="hidden" />
            </div>
            HTML;

test('attributes can be set', function () {
    $template = <<<'HTML'
            <x-color-picker name="color" id="mainColor" class="mr-2" />
            HTML;

    expect(blade($template))->toMatchSnapshot();
});

test('js options can be passed along', function () {
    $template = <<<'HTML'
            <x-color-picker name="color" :options="['theme' => 'monolith']" />
            HTML;

    expect(blade($template))->toMatchSnapshot();
});

test('inputs can have old values', function () {
    $this->flashOld(['color' => '#FF9900']);

    $template = <<<'HTML'
            <x-color-picker name="color" :options="['default' => '#000000']" />
            HTML;
            
    expect(blade($template))->toMatchSnapshot();
});
