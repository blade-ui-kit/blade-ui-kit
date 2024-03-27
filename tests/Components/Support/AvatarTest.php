<?php

declare(strict_types=1);

namespace Tests\Components\Support;

use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class AvatarTest extends ComponentTestCase
{
    #[Test]
    public function the_component_can_be_rendered()
    {
        $this->assertComponentRenders(
            '<img src="https://unavatar.io/johndoe?" />',
            '<x-avatar search="johndoe"/>',
        );
    }

    #[Test]
    public function it_can_have_a_given_avatar_image()
    {
        $this->assertComponentRenders(
            '<img src="https://example.com/image.png" />',
            '<x-avatar search="johndoe" src="https://example.com/image.png"/>',
        );
    }

    #[Test]
    public function it_accepts_providers()
    {
        $this->assertComponentRenders(
            '<img src="https://unavatar.io/gravatar/john@example.com?" />',
            '<x-avatar search="john@example.com" provider="gravatar"/>',
        );
    }

    #[Test]
    public function it_accepts_fallbacks()
    {
        $this->assertComponentRenders(
            '<img src="https://unavatar.io/johndoe?fallback=https%3A%2F%2Fexample.com%2Fimage.png" />',
            '<x-avatar search="johndoe" fallback="https://example.com/image.png"/>',
        );
    }
}
