<?php
  
declare(strict_types=1);

test('the component can be rendered', function () {
    $template = <<<'HTML'
            <x-form action="http://example.com">
                Form fields...
            </x-form>
            HTML;

    $expected = <<<'HTML'
            <form method="POST" action="http://example.com">
                <input type="hidden" name="_token" value="" autocomplete="off">
                <input type="hidden" name="_method" value="POST">
                Form fields...

            </form>
            HTML;

    assertComponentRenders($expected, $template);
});

test('the method can be set', function () {
    $template = <<<'HTML'
            <x-form method="PUT" action="http://example.com">
                Form fields...
            </x-form>
            HTML;

    $expected = <<<'HTML'
            <form method="POST" action="http://example.com">
                <input type="hidden" name="_token" value="" autocomplete="off">
                <input type="hidden" name="_method" value="PUT">
                Form fields...

            </form>
            HTML;

    assertComponentRenders($expected, $template);
});

it('can enable file uploads', function () {
    $template = <<<'HTML'
            <x-form method="PUT" action="http://example.com" has-files>
                Form fields...
            </x-form>
            HTML;

    $expected = <<<'HTML'
            <form method="POST" action="http://example.com" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="" autocomplete="off">
                <input type="hidden" name="_method" value="PUT">
                Form fields...

            </form>
            HTML;

    assertComponentRenders($expected, $template);
});

test('the action prop is optional', function () {
    $template = <<<'HTML'
            <x-form method="POST">
                Form fields...
            </x-form>
            HTML;

    $expected = <<<'HTML'
            <form method="POST">
                <input type="hidden" name="_token" value="" autocomplete="off">
                <input type="hidden" name="_method" value="POST">
                Form fields...

            </form>
            HTML;

    assertComponentRenders($expected, $template);
});
