<?php

  
declare(strict_types=1);
use PHPUnit\Framework\Attributes\Test;
test('the component can be rendered', function () {
    $expected = <<<'HTML'
            <input x-data="{ picker: null, initPicker() { if (this.picker) return; this.picker = flatpickr(this.$el, {&quot;dateFormat&quot;:&quot;Y-m-d H:i&quot;,&quot;altInput&quot;:true,&quot;enableTime&quot;:true}); } }" x-init="$nextTick(() =>
            { initPicker() })" name="birthday" type="text" id="birthday" placeholder="Y-m-d H:i" />
            HTML;

    $this->assertComponentRenders($expected, '<x-flat-pickr name="birthday"/>');
});
test('flatpickr can have old values', function () {
    $this->flashOld(['birthday' => '23/03/1989']);

    $expected = <<<'HTML'
            <input x-data="{ picker: null, initPicker() { if (this.picker) return; this.picker = flatpickr(this.$el, {&quot;dateFormat&quot;:&quot;Y-m-d H:i&quot;,&quot;altInput&quot;:true,&quot;enableTime&quot;:true}); } }" x-init="$nextTick(() =>
            { initPicker() })" name="birthday" type="text" id="birthday" placeholder="Y-m-d H:i" value="23/03/1989" />
            HTML;

    $this->assertComponentRenders($expected, '<x-flat-pickr name="birthday"/>');
});
