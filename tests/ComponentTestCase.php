<?php

declare(strict_types=1);

namespace Tests;

use BladeUI\BladeUIServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class ComponentTestCase extends TestCase
{
    use InteractsWithViews;

    protected function flashOld(array $input): void
    {
        session()->flashInput($input);

        request()->setLaravelSession(session());
    }

    protected function getPackageProviders($app): array
    {
        return [BladeUIServiceProvider::class];
    }

    public function assertComponentRenders(string $expected, string $template, array $data = []): void
    {
        $cleaned = trim((string) $this->blade($template, $data));
        $cleaned = str_replace(' >', '>', $cleaned);

        $this->assertSame($expected, $cleaned);
    }
}
