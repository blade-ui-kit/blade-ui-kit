<?php

use Tests\Components\ComponentTestCase;

uses(ComponentTestCase::class)->in('Components');

/**
 * Render the contents of the given Blade template string.
 *
 * @param  string  $template
 * @param  \Illuminate\Contracts\Support\Arrayable|array  $data
 * @return \Tests\TestView
 */
function blade(string $template, array $data = [])
{
    return test()->blade($template, $data);
}
