<?php

use Tests\Browser\DuskTestCase;
use Tests\Components\ComponentTestCase;
use Tests\TestView;

uses(ComponentTestCase::class)->in('Components');
uses(DuskTestCase::class)->in('Browser');

function blade(string $template, array $data = []): TestView
{
    return test()->blade($template, $data);
}
