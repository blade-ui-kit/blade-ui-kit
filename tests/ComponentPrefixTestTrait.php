<?php

namespace Tests;

trait ComponentPrefixTestTrait
{
    protected function getEnvironmentSetUp($app): void
    {
        parent::getEnvironmentSetUp($app);

        $app['config']->set('blade-ui-kit.prefix', 'ui');
    }
}
