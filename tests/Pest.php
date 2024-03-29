<?php

use Tests\Components\ComponentTestCase;

uses(ComponentTestCase::class)->in('Components');

/**
 * Render the contents of the given Blade template string.
 *
 * @return \Tests\TestView
 */
function blade(string $template, array $data = [])
{
    return test()->blade($template, $data);
}
