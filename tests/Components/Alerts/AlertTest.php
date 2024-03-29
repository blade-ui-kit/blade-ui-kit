<?php

declare(strict_types=1);

test('the component can be rendered', function () {
    session()->flash('alert', 'Form was successfully submitted.');

    expect(blade('<x-alert />'))->toMatchSnapshot();
});

test('we can specify a type', function () {
    session()->flash('error', 'Form contains some errors.');

    expect(blade('<x-alert type="error"/>'))->toMatchSnapshot();
});

it('can be slotted', function () {
    session()->flash('alert', 'Form was successfully submitted.');

    $template = <<<'HTML'
            <x-alert>
                <span>Hello World</span>
                {{ $component->message() }}
            </x-alert>
            HTML;

    expect(blade($template))->toMatchSnapshot();
});

test('multiple messages can be used', function () {
    session()->flash('alert', [
        'Form was successfully submitted.',
        'We have sent you a confirmation email.',
    ]);

    $template = <<<'HTML'
            <x-alert>
                <span>Hello World</span>
                {{ implode(' ', $component->messages()) }}
            </x-alert>
            HTML;

    expect(blade($template))->toMatchSnapshot();
});
