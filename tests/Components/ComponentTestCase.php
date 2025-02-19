<?php

namespace Tests\Components;

use BladeUIKit\BladeUIKitServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class ComponentTestCase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('view:clear');
    }

    protected function flashOld(array $input): void
    {
        session()->flashInput($input);

        request()->setLaravelSession(session()->driver());
    }

    protected function getPackageProviders($app): array
    {
        return [BladeUIKitServiceProvider::class];
    }
}
