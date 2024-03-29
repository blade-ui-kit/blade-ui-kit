<?php

use Tests\Components\ComponentTestCase;
use Tests\TestView;

uses(ComponentTestCase::class)->in('Components');

function blade(string $template, array $data = []): TestView
{
    return test()->blade($template, $data);
}
