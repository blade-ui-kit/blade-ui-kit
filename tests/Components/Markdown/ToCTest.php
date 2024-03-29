<?php

declare(strict_types=1);

it('can render markdown to html', function () {
    $template = <<<'HTML'
            <x-toc>
            # Hello World

            Blade UI components are **awesome**.

            ## Sub Title level 2

            Some content.

            ### Sub Sub Title level 3

            #### Sub Sub Title level 4

            Some content.

            ## Other Sub Title level 2

            ### Sub Sub Title level 3

            Some content.
            </x-toc>
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});

it('accepts a base url', function () {
    $template = <<<'HTML'
            <x-toc url="http://example.com/foo">
            # Hello World

            Blade UI components are **awesome**.

            ## Sub Title level 2

            Some content.

            ### Sub Sub Title level 3

            Some content.
            </x-toc>
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});

test('headings in code blocks are skipped', function () {
    $template = <<<'HTML'
            <x-toc>
            # Hello World

            Blade UI components are **awesome**.

            ## Sub Title level 2

                ## Code Snippet Header

            Some content.

            ```
            ## Code Snippet Header
            ```
            </x-toc>
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});
