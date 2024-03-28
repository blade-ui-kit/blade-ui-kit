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

    $expected = <<<'HTML'
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="csrf-token" content="">
                    <title>Blade UI Kit</title>
                    <link rel="icon" href="favicon.ico" />
                </head>
                <body class="font-sans">
                <h1>Hello World</h1>
                </body>
            </html>
            HTML;

    $this->assertComponentRenders($expected, $template);
});
