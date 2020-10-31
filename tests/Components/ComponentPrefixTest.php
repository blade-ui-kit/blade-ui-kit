<?php

declare(strict_types=1);

namespace Tests\Components;

class ComponentPrefixTest extends ComponentTestCase
{
    protected function getEnvironmentSetUp($app): void
    {
        parent::getEnvironmentSetUp($app);

        $app['config']->set('blade-ui-kit.prefix', 'ui');
    }

    /** @test */
    public function we_can_set_a_config_prefix()
    {
        $expected = <<<'HTML'
            <span title="Every Sunday at 12:00am">
                @weekly
            </span>
            HTML;

        $this->assertComponentRenders($expected, '<x-ui-cron schedule="@weekly"/>');
    }
}
