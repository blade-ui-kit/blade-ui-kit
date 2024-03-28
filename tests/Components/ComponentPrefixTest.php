<?php

declare(strict_types=1);

use Tests\ComponentPrefixTestTrait;

uses(ComponentPrefixTestTrait::class);

test('we can set a config prefix', function () {
    $expected = <<<'HTML'
            <span title="Every Sunday at 12:00am">
                @weekly
            </span>
            HTML;

    $this->assertComponentRenders($expected, '<x-ui-cron schedule="@weekly"/>');
});
