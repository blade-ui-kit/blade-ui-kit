<?php

declare(strict_types=1);

it('can render markdown to html', function () {
    $template = <<<'HTML'
            <x-markdown>
            # Hello World

            Blade UI components are **awesome**.

            Check them out [here](https://github.com/blade-ui-kit).
            </x-markdown>
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});

it('can render github flavored markdown to html', function () {
    $template = <<<'HTML'
            <x-markdown flavor="github">
            Blade UI components are ~~cool~~, **awesome**.
            </x-markdown>
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});

test('options can be passed', function () {
    $template = <<<'HTML'
            <x-markdown :options="['commonmark' => ['use_asterisk' => false]]">
            # Hello World

            Blade UI components are *awesome*.
            </x-markdown>
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});

test('anchors can be generated', function () {
    $template = <<<'HTML'
            <x-markdown anchors>
            # Hello World

            Blade UI components are *awesome*.

            ## Foo Title

            Some content.

            ### Baz Title

            Other content.
            </x-markdown>
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});

test('anchors are not generated for headers in code blocks', function () {
    $template = <<<'HTML'
            <x-markdown anchors>
            # Hello World

            Blade UI components are **awesome**.

            ## Sub Title level 2

                ## Code Snippet Header

            Some content.

            ```
            <div>
            ## Code Snippet Header

            Some content.
            </div>
            ```
            </x-markdown>
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});
