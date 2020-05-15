<?php

declare(strict_types=1);

namespace Tests\Support;

use Carbon\Carbon;
use Tests\ComponentTestCase;

class DateTimeTest extends ComponentTestCase
{
    protected function tearDown(): void
    {
        parent::tearDown();

        Carbon::setTestNow();
    }

    /** @test */
    public function its_component_can_be_rendered()
    {
        $expected = <<<HTML
<span title="2 hours from now">
    2020-05-13 23:00:00
</span>
HTML;

        Carbon::setTestNow(new Carbon('2020-05-13 21:00:00', 'CET'));

        $this->assertSameComponent($expected, '<x-date-time :date="$date"/>', [
            'date' => new Carbon('2020-05-13 23:00:00', 'CET'),
        ]);
    }

    /** @test */
    public function its_component_can_be_rendered_in_a_specific_format()
    {
        $expected = <<<HTML
<span title="2 hours from now">
    13/05/2020 23:00
</span>
HTML;

        Carbon::setTestNow(new Carbon('2020-05-13 21:00:00', 'CET'));

        $this->assertSameComponent($expected, '<x-date-time :date="$date" format="d/m/Y H:i"/>', [
            'date' => new Carbon('2020-05-13 23:00:00', 'CET'),
        ]);
    }

    /** @test */
    public function its_component_can_be_rendered_as_human_readable()
    {
        $expected = <<<HTML
<time datetime="2020-05-13 23:00:00">
    2 hours from now
</time>
HTML;

        Carbon::setTestNow(new Carbon('2020-05-13 21:00:00', 'CET'));

        $this->assertSameComponent($expected, '<x-date-time :date="$date" human/>', [
            'date' => new Carbon('2020-05-13 23:00:00', 'CET'),
        ]);
    }
}
