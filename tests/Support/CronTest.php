<?php

declare(strict_types=1);

namespace Tests\Support;

use BladeUI\Support\Cron;
use Tests\ComponentTest;

class CronTest extends ComponentTest
{
    /** @test */
    public function its_component_can_be_rendered()
    {
        $view = trim((string) $this->blade('<x-cron schedule="@weekly"/>'));

        $expected = <<<Blade
<span title="Every Sunday at 12:00am">
    @weekly
</span>
Blade;

        $this->assertSame($expected, (string) $view);
    }

    /** @test */
    public function it_can_translate_a_cron()
    {
        $cron = new Cron('0 16 * * 1');

        $this->assertSame('Every Monday at 4:00pm', $cron->translate());
    }
}
