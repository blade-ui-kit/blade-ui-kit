<?php

declare(strict_types=1);

namespace Tests\Support;

use Carbon\Carbon;
use Tests\ComponentTest;

class DateTimeTest extends ComponentTest
{
    /** @test */
    public function its_component_can_be_rendered()
    {
        $date = new Carbon('2020-05-13 23:00:00', 'CET');

        Carbon::setTestNow(new Carbon('2020-05-13 21:00:00', 'CET'));

        $view = trim((string) $this->blade('<x-date-time :date="$date"/>', ['date' => $date]));

        $expected = <<<Blade
        <span title="2 hours from now">
            2020-05-13 23:00:00
        </span>
        Blade;

        $this->assertSame($expected, (string) $view);
    }

    /** @test */
    public function its_component_can_be_rendered_in_a_specific_format()
    {
        $date = new Carbon('2020-05-13 23:00:00', 'CET');

        Carbon::setTestNow(new Carbon('2020-05-13 21:00:00', 'CET'));

        $view = trim((string) $this->blade('<x-date-time :date="$date" format="d/m/Y H:i"/>', ['date' => $date]));

        $expected = <<<Blade
        <span title="2 hours from now">
            13/05/2020 23:00
        </span>
        Blade;

        $this->assertSame($expected, (string) $view);
    }
}
