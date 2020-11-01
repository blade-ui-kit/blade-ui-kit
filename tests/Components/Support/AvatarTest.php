<?php

declare(strict_types=1);

namespace Tests\Components\Support;

use Tests\Components\ComponentTestCase;

class AvatarTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $this->assertComponentRenders(
            '<img src="https://unavatar.now.sh/johndoe?" />',
            '<x-avatar search="johndoe"/>',
        );
    }

    /** @test */
    public function it_can_have_a_given_avatar_image()
    {
        $this->assertComponentRenders(
            '<img src="https://example.com/image.png" />',
            '<x-avatar search="johndoe" src="https://example.com/image.png"/>',
        );
    }

    /** @test */
    public function it_accepts_providers()
    {
        $this->assertComponentRenders(
            '<img src="https://unavatar.now.sh/gravatar/john@example.com?" />',
            '<x-avatar search="john@example.com" provider="gravatar"/>',
        );
    }

    /** @test */
    public function it_accepts_fallbacks()
    {
        $this->assertComponentRenders(
            '<img src="https://unavatar.now.sh/johndoe?fallback=https%3A%2F%2Fexample.com%2Fimage.png" />',
            '<x-avatar search="johndoe" fallback="https://example.com/image.png"/>',
        );
    }
}
