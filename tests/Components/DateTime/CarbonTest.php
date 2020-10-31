<?php

declare(strict_types=1);

namespace Tests\Components\DateTime;

use Carbon\Carbon;
use Tests\Components\ComponentTestCase;

class CarbonTest extends ComponentTestCase
{
    protected function tearDown(): void
    {
        parent::tearDown();

        Carbon::setTestNow();
    }

    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<'HTML'
            <span title="2 hours from now">
                2020-05-13 23:00:00
            </span>
            HTML;

        Carbon::setTestNow(new Carbon('2020-05-13 21:00:00', 'CET'));

        $this->assertComponentRenders($expected, '<x-carbon :date="$date"/>', [
            'date' => new Carbon('2020-05-13 23:00:00', 'CET'),
        ]);
    }

    /** @test */
    public function its_component_can_be_rendered_in_a_specific_format()
    {
        $expected = <<<'HTML'
            <span title="2 hours from now">
                13/05/2020 23:00
            </span>
            HTML;

        Carbon::setTestNow(new Carbon('2020-05-13 21:00:00', 'CET'));

        $this->assertComponentRenders($expected, '<x-carbon :date="$date" format="d/m/Y H:i"/>', [
            'date' => new Carbon('2020-05-13 23:00:00', 'CET'),
        ]);
    }

    /** @test */
    public function its_component_can_be_rendered_as_human_readable()
    {
        $expected = <<<'HTML'
            <time datetime="2020-05-13 23:00:00">
                2 hours from now
            </time>
            HTML;

        Carbon::setTestNow(new Carbon('2020-05-13 21:00:00', 'CET'));

        $this->assertComponentRenders($expected, '<x-carbon :date="$date" human/>', [
            'date' => new Carbon('2020-05-13 23:00:00', 'CET'),
        ]);
    }

    /** @test */
    public function it_can_be_displayed_in_the_local_timezone()
    {
        $expected = <<<'HTML'
            <span x-data="{ formatLocalTimeZone: function (element, timestamp) { const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone; const date = moment.unix(timestamp).tz(timeZone); element.innerHTML = date.format('YYYY-MM-DD HH:mm:ss (z)'); } }" x-init="formatLocalTimeZone($el, 1589407200)" title="2 hours from now">
                2020-05-13 23:00:00
            </span>
            HTML;

        Carbon::setTestNow(new Carbon('2020-05-13 21:00:00', 'CET'));

        $this->assertComponentRenders($expected, '<x-carbon :date="$date" local/>', [
            'date' => new Carbon('2020-05-13 23:00:00', 'CET'),
        ]);
    }
}
