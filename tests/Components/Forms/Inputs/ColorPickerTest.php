<?php
  
declare(strict_types=1);

test('the component can be rendered', function () {
    $template = <<<'HTML'
            <x-color-picker name="color" />
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});

test('attributes can be set', function () {
    $template = <<<'HTML'
            <x-color-picker name="color" id="mainColor" class="mr-2" />
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});

test('js options can be passed along', function () {
    $template = <<<'HTML'
            <x-color-picker name="color" :options="['theme' => 'monolith']" />
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});

test('inputs can have old values', function () {
    $this->flashOld(['color' => '#FF9900']);

    $template = <<<'HTML'
            <x-color-picker name="color" :options="['default' => '#000000']" />
            HTML;
            
    expect($this->blade($template))->toMatchSnapshot();
});
