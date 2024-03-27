<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class CheckboxTest extends ComponentTestCase
{
    #[Test]
    public function the_component_can_be_rendered()
    {
        $this->assertComponentRenders(
            '<input name="remember_me" type="checkbox" id="remember_me" />',
            '<x-checkbox name="remember_me"/>',
        );
    }

    #[Test]
    public function specific_attributes_can_be_overwritten()
    {
        $this->assertComponentRenders(
            '<input name="remember_me" type="checkbox" id="rememberMe" class="p-4" />',
            '<x-checkbox name="remember_me" id="rememberMe" class="p-4" />',
        );
    }

    #[Test]
    public function inputs_can_have_old_values()
    {
        $this->flashOld(['remember_me' => true]);

        $this->assertComponentRenders(
            '<input name="remember_me" type="checkbox" id="remember_me" value="1" checked />',
            '<x-checkbox name="remember_me"/>',
        );
    }
}
