<?php

declare(strict_types=1);

namespace Tests\Forms;

use Tests\ComponentTestCase;

class SubmitTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $this->artisan('view:clear');

        $expected = <<<HTML
<button type="submit">
    Click me
</button>
HTML;

        $this->assertComponentRenders($expected, '<x-submit>Click me</x-submit>');
    }
}
