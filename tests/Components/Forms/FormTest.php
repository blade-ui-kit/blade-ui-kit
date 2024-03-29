<?php
  
declare(strict_types=1);

test('the component can be rendered', function () {
    $template = <<<'HTML'
            <x-form action="http://example.com">
                Form fields...
            </x-form>
            HTML;

    expect(blade($template))->toMatchSnapshot();
});

test('the method can be set', function () {
    $template = <<<'HTML'
            <x-form method="PUT" action="http://example.com">
                Form fields...
            </x-form>
            HTML;

    expect(blade($template))->toMatchSnapshot();
});

it('can enable file uploads', function () {
    $template = <<<'HTML'
            <x-form method="PUT" action="http://example.com" has-files>
                Form fields...
            </x-form>
            HTML;

    expect(blade($template))->toMatchSnapshot();
});

test('the action prop is optional', function () {
    $template = <<<'HTML'
            <x-form method="POST">
                Form fields...
            </x-form>
            HTML;

    expect(blade($template))->toMatchSnapshot();
});
