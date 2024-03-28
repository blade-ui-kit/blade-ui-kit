<?php

use Gajus\Dindent\Indenter;
use Tests\Components\ComponentTestCase;

uses(ComponentTestCase::class)->in('Components');

function assertComponentRenders(string $expected, string $template, array $data = []): void
{
    $indenter = new Indenter();
    $indenter->setElementType('h1', Indenter::ELEMENT_TYPE_INLINE);
    $indenter->setElementType('del', Indenter::ELEMENT_TYPE_INLINE);

    $blade = (string) test()->blade($template, $data);
    $indented = $indenter->indent($blade);
    $cleaned = str_replace(
        [' >', "\n/>", ' </div>', '> ', "\n>"],
        ['>', ' />', "\n</div>", ">\n    ", '>'],
        $indented,
    );

    expect($cleaned)->toBe($expected);
}
