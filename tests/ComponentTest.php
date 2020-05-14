<?php

declare(strict_types=1);

namespace Tests;

use BladeUI\BladeUIServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class ComponentTest extends TestCase
{
    use InteractsWithViews;

    protected function getPackageProviders($app)
    {
        return [BladeUIServiceProvider::class];
    }
}
