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
            '<img src="https://unavatar.now.sh/driesvints?" />',
            '<x-avatar search="driesvints"/>'
        );
    }

    /** @test */
    public function it_can_have_a_given_avatar_image()
    {
        $this->assertComponentRenders(
            '<img src="https://example.com/image.png" />',
            '<x-avatar search="driesvints" src="https://example.com/image.png"/>'
        );
    }

    /** @test */
    public function it_accepts_providers()
    {
        $this->assertComponentRenders(
            '<img src="https://unavatar.now.sh/gravatar/dries.vints@gmail.com?" />',
            '<x-avatar search="dries.vints@gmail.com" provider="gravatar"/>'
        );
    }

    /** @test */
    public function it_accepts_fallbacks()
    {
        $this->assertComponentRenders(
            '<img src="https://unavatar.now.sh/driesvints?fallback=https%3A%2F%2Fexample.com%2Fimage.png" />',
            '<x-avatar search="driesvints" fallback="https://example.com/image.png"/>'
        );
    }
}
