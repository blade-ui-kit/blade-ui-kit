<?php

declare(strict_types=1);

namespace Tests\Support;

use Tests\ComponentTestCase;

class UnavatarTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $this->assertComponentRenders(
            '<img src="https://unavatar.now.sh/driesvints?" />',
            '<x-avatar src="driesvints"/>'
        );
    }

    /** @test */
    public function the_component_accepts_providers()
    {
        $this->assertComponentRenders(
            '<img src="https://unavatar.now.sh/gravatar/dries.vints@gmail.com?" />',
            '<x-avatar src="dries.vints@gmail.com" provider="gravatar"/>'
        );
    }

    /** @test */
    public function the_component_accepts_fallbacks()
    {
        $this->assertComponentRenders(
            '<img src="https://unavatar.now.sh/driesvints?fallback=https%3A%2F%2Fexample.com%2Fimage.png" />',
            '<x-avatar src="driesvints" fallback="https://example.com/image.png"/>'
        );
    }
}
