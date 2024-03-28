<?php

declare(strict_types=1);

test('the component can be rendered', function () {
    $expected = <<<HTML
            <input x-data x-init="new Pikaday({ field: \$el , ...{&quot;format&quot;:&quot;DD\/MM\/YYYY&quot;} })" name="birthday" type="text" id="birthday" placeholder="DD/MM/YYYY" />
            HTML;

    assertComponentRenders($expected, '<x-pikaday name="birthday"/>');
});

test('pikaday can have old values', function () {
    $this->flashOld(['birthday' => '23/03/1989']);

    $expected = <<<HTML
            <input x-data x-init="new Pikaday({ field: \$el , ...{&quot;format&quot;:&quot;DD\/MM\/YYYY&quot;} })" name="birthday" type="text" id="birthday" placeholder="DD/MM/YYYY" value="23/03/1989" />
            HTML;

    assertComponentRenders($expected, '<x-pikaday name="birthday"/>');
});
