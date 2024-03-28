<?php

  
declare(strict_types=1);
use PHPUnit\Framework\Attributes\Test;
it('can render markdown to html', function () {
    $template = <<<'HTML'
            <x-markdown>
            # Hello World

            Blade UI components are **awesome**.

            Check them out [here](https://github.com/blade-ui-kit).
            </x-markdown>
            HTML;

    $expected = <<<'HTML'
            <div>
                <h1>Hello World</h1>

                <p>Blade UI components are <strong>awesome</strong>.</p>
                <p>Check them out <a href="https://github.com/blade-ui-kit">here</a>.</p>
            </div>
            HTML;

    $this->assertComponentRenders($expected, $template);
});
it('can render github flavored markdown to html', function () {
    $template = <<<'HTML'
            <x-markdown flavor="github">
            Blade UI components are ~~cool~~, **awesome**.
            </x-markdown>
            HTML;

    $expected = <<<'HTML'
            <div>
                <p>Blade UI components are <del>cool</del>, <strong>awesome</strong>.</p>
            </div>
            HTML;

    $this->assertComponentRenders($expected, $template);
});
test('options can be passed', function () {
    $template = <<<'HTML'
            <x-markdown :options="['commonmark' => ['use_asterisk' => false]]">
            # Hello World

            Blade UI components are *awesome*.
            </x-markdown>
            HTML;

    $expected = <<<'HTML'
            <div>
                <h1>Hello World</h1>

                <p>Blade UI components are *awesome*.</p>
            </div>
            HTML;

    $this->assertComponentRenders($expected, $template);
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

    $expected = <<<'HTML'
            <div>
                <h1>Hello World</h1>

                <p>Blade UI components are <em>awesome</em>.</p>
                <p><a class="anchor" name="foo-title"></a></p>
                <h2>
                    Foo Title
                </h2>
                <p>Some content.</p>
                <p><a class="anchor" name="baz-title"></a></p>
                <h3>
                    Baz Title
                </h3>
                <p>Other content.</p>
            </div>
            HTML;

    $this->assertComponentRenders($expected, $template);
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

    $expected = <<<'HTML'
            <div>
                <h1>Hello World</h1>

                <p>Blade UI components are <strong>awesome</strong>.</p>
                <p><a class="anchor" name="sub-title-level-2"></a></p>
                <h2>
                    Sub Title level 2
                </h2>
                <pre><code>## Code Snippet Header
            </code></pre>
                <p>Some content.</p>
                <pre><code>&lt;div&gt;
            ## Code Snippet Header Some content.
            &lt;/div&gt;
            </code></pre>
            </div>
            HTML;

    $this->assertComponentRenders($expected, $template);
});
