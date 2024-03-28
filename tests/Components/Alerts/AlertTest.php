<?php
declare(strict_types=1);

  

test('the component can be rendered', function () {
    session()->flash('alert', 'Form was successfully submitted.');

    $expected = <<<'HTML'
            <div role="alert">
                Form was successfully submitted.
            </div>
            HTML;

    $this->assertComponentRenders($expected, '<x-alert/>');
});
test('we can specify a type', function () {
    session()->flash('error', 'Form contains some errors.');

    $expected = <<<'HTML'
            <div role="alert">
                Form contains some errors.
            </div>
            HTML;

    $this->assertComponentRenders($expected, '<x-alert type="error"/>');
});
it('can be slotted', function () {
    session()->flash('alert', 'Form was successfully submitted.');

    $template = <<<'HTML'
            <x-alert>
                <span>Hello World</span>
                {{ $component->message() }}
            </x-alert>
            HTML;

    $expected = <<<'HTML'
            <div role="alert">
                <span>Hello World</span>
                Form was successfully submitted.
            </div>
            HTML;

    $this->assertComponentRenders($expected, $template);
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
    $expected = <<<'HTML'
            <div role="alert">
                <span>Hello World</span>
                Form was successfully submitted. We have sent you a confirmation email.
            </div>
            HTML;

    $this->assertComponentRenders($expected, $template);
});
