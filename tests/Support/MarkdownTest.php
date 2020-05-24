<?php

declare(strict_types=1);

namespace Tests\Support;

use Tests\ComponentTestCase;

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
}
