<?php
  
declare(strict_types=1);

test('the component can be rendered', function () {
    $expected = <<<'HTML'
            <textarea x-data x-init="new EasyMDE({ element: $el , ...{&quot;forceSync&quot;:true} })" name="about" id="about"></textarea>
            HTML;

    assertComponentRenders($expected, '<x-easy-mde name="about"/>');
});

test('editor can have old values', function () {
    $this->flashOld(['about' => 'About me text']);

    $expected = <<<'HTML'
            <textarea x-data x-init="new EasyMDE({ element: $el , ...{&quot;forceSync&quot;:true} })" name="about" id="about">About me text</textarea>
            HTML;

    assertComponentRenders($expected, '<x-easy-mde name="about"/>');
});

test('editor can have options', function () {
    assertComponentRenders(
        '<textarea x-data x-init="new EasyMDE({ element: $el , ...{&quot;forceSync&quot;:true,&quot;minHeight&quot;:&quot;500px&quot;} })" name="about" id="about"></textarea>',
        '<x-easy-mde name="about" :options="[\'minHeight\' => \'500px\']"/>',
    );
});
