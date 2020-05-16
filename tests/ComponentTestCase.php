<?php

declare(strict_types=1);

namespace Tests;

use BladeUI\BladeUIServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class ComponentTestCase extends TestCase
{
    use InteractsWithViews;

    protected function getPackageProviders($app): array
    {
        return [BladeUIServiceProvider::class];
    }

    public function assertComponentRenders(string $expected, string $template, array $data = []): void
    {
        $this->assertSame($expected, trim((string) $this->blade($template, $data)));
    }
}
