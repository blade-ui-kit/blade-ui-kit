<?php
  
declare(strict_types=1);

it('can render to html', function () {
    $template = <<<'HTML'
            <x-html class="font-sans" title="Blade UI Kit">
                <x-slot name="head">
                    <link rel="icon" href="favicon.ico" />
                </x-slot>

                <h1>Hello World</h1>
            </x-html>
            HTML;

    expect(blade($template))->toMatchSnapshot();
});
