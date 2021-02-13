<?php

declare(strict_types=1);

namespace Tests\Components\Support;

use BladeUIKit\Components\Support\Cron;
use Tests\Components\ComponentTestCase;

class CronTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<'HTML'
            <span title="Every Sunday at 12:00am">
                @weekly
            </span>
            HTML;

        $this->assertComponentRenders($expected, '<x-cron schedule="@weekly"/>');
    }

    /** @test */
    public function it_can_translate_a_cron()
    {
        $cron = new Cron('0 16 * * 1');

        $this->assertSame('Every Monday at 4:00pm', $cron->translate());
    }

    /** @test */
    public function its_component_can_be_rendered_as_human_readable()
    {
        $expected = <<<'HTML'
            <span title="@weekly">
                Every Sunday at 12:00am
            </span>
            HTML;

        $this->assertComponentRenders($expected, '<x-cron schedule="@weekly" human/>');
    }

    /** @test */
    public function it_can_translate_a_cron_to_a_supported_locale()
    {
        $expected = <<<'HTML'
            <span title="@weekly">
                Chaque dimanche à 12:00am
            </span>
            HTML;

        $this->assertComponentRenders($expected, '<x-cron schedule="@weekly" locale="fr" human/>');
    }

    /** @test */
    public function it_defaults_to_english_with_an_unknown_locale()
    {
        $expected = <<<'HTML'
            <span title="@weekly">
                Every Sunday at 12:00am
            </span>
            HTML;

        $this->assertComponentRenders($expected, '<x-cron schedule="@weekly" locale="typo" human/>');
    }

    /** @test */
    public function it_can_display_time_in_24_hour_format()
    {
        $expected = <<<'HTML'
            <span title="@weekly">
                Every Sunday at 0:00
            </span>
            HTML;

        $this->assertComponentRenders($expected, '<x-cron schedule="@weekly" use24hour="true" human/>');
    }
}
