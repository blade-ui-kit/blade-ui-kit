<?php

declare(strict_types=1);

namespace Tests\Components\Layouts;

use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class SocialMetaTest extends ComponentTestCase
{
    #[Test]
    public function it_can_render_to_html()
    {
        $template = <<<'HTML'
            <x-social-meta
                title="Hello World"
                description="Blade components are awesome!"
                card="summary"
                image="http://example.com/social.jpg"
            />
            HTML;

        $expected = <<<'HTML'
            <meta name="twitter:card" content="summary" />
            <meta property="og:type" content="website">
            <meta property="og:title" content="Hello World" />
            <meta name="description" content="Blade components are awesome!">
            <meta property="og:description" content="Blade components are awesome!">
            <meta property="og:image" content="http://example.com/social.jpg" />
            <meta property="og:url" content="http://localhost" />
            <meta property="og:locale" content="en" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
