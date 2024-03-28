<?php

declare(strict_types=1);

test('the component can be rendered', function () {
    $expected = <<<'HTML'
            <label for="first_name">
                First name
            </label>
            HTML;

    $this->assertComponentRenders($expected, '<x-label for="first_name"/>');
});
