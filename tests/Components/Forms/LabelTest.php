<?php

declare(strict_types=1);

namespace Tests\Components\Forms;

use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class LabelTest extends ComponentTestCase
{
    #[Test]
    public function the_component_can_be_rendered()
    {
        $expected = <<<'HTML'
            <label for="first_name">
                First name
            </label>
            HTML;

        $this->assertComponentRenders($expected, '<x-label for="first_name"/>');
    }
}
