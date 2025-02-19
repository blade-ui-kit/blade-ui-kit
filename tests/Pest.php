<?php

use Illuminate\Testing\TestView;
use Tests\Browser\DuskTestCase;
use Tests\Components\ComponentTestCase;

uses(ComponentTestCase::class)->in('Components');
uses(DuskTestCase::class)->in('Browser');

function blade(string $template, array $data = []): TestView
{
    return test()->blade($template, $data);
}
