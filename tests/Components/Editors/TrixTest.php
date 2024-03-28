<?php

  
declare(strict_types=1);
use PHPUnit\Framework\Attributes\Test;
test('the component can be rendered', function () {
    $expected = <<<'HTML'
            <div>
                <input name="about" id="about" value="" type="hidden">
                <trix-editor input="about" class="trix-content">
                </trix-editor>
            </div>
            HTML;

    $this->assertComponentRenders($expected, '<x-trix name="about"/>');
});
test('editor can have old values', function () {
    $this->flashOld(['about' => 'About me text']);

    $expected = <<<'HTML'
            <div>
                <input name="about" id="about" value="About me text" type="hidden">
                <trix-editor input="about" class="trix-content">
                </trix-editor>
            </div>
            HTML;

    $this->assertComponentRenders($expected, '<x-trix name="about"/>');
});
