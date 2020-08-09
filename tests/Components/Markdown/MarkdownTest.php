<?php

declare(strict_types=1);

namespace Tests\Components\Markdown;

use Tests\Components\ComponentTestCase;

class MarkdownTest extends ComponentTestCase
{
    /** @test */
    public function it_can_render_markdown_to_html()
    {
        $template = <<<HTML
<x-markdown>
# Hello World

Blade UI components are **awesome**.

Check them out [here](https://github.com/blade-ui-kit).
</x-markdown>
HTML;

        $expected = <<<HTML
<div>
    <h1>Hello World</h1>

    <p>Blade UI components are <strong>awesome</strong>.</p>
    <p>Check them out <a href="https://github.com/blade-ui-kit">here</a>.</p>
</div>
HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function it_can_render_github_flavored_markdown_to_html()
    {
        $template = <<<HTML
<x-markdown flavor="github">
Blade UI components are ~~cool~~, **awesome**.
</x-markdown>
HTML;

        $expected = <<<HTML
<div>
    <p>Blade UI components are <del>cool</del>, <strong>awesome</strong>.</p>
</div>
HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function options_can_be_passed()
    {
        $template = <<<HTML
<x-markdown :options="['use_asterisk' => false]">
# Hello World

Blade UI components are *awesome*.
</x-markdown>
HTML;

        $expected = <<<HTML
<div>
    <h1>Hello World</h1>

    <p>Blade UI components are *awesome*.</p>
</div>
HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function anchors_can_be_generated()
    {
        $template = <<<HTML
<x-markdown anchors>
# Hello World

Blade UI components are *awesome*.

## Foo Title

Some content.

### Baz Title

Other content.
</x-markdown>
HTML;

        $expected = <<<HTML
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
    }
}
