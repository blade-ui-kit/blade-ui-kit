<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class EmailTest extends ComponentTestCase
{
    #[Test]
    public function the_component_can_be_rendered()
    {
        $this->assertComponentRenders(
            '<input name="email" type="email" id="email" />',
            '<x-email/>',
        );
    }

    #[Test]
    public function specific_attributes_can_be_overwritten()
    {
        $this->assertComponentRenders(
            '<input name="email_address" type="email" id="emailAddress" class="p-4" />',
            '<x-email name="email_address" id="emailAddress" class="p-4" />',
        );
    }

    #[Test]
    public function inputs_can_have_old_values()
    {
        $this->flashOld(['email' => 'Eloquent']);

        $this->assertComponentRenders(
            '<input name="email" type="email" id="email" value="Eloquent" />',
            '<x-email/>',
        );
    }
}
