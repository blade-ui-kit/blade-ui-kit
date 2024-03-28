<?php

declare(strict_types=1);

use Carbon\Carbon;

test('the component can be rendered', function () {
    Carbon::setTestNow(new Carbon('2020-06-10 18:00:00', 'CET'));

    $expected = <<<'HTML'
            <div x-data="
            { timer: { days: '00', hours: '23', minutes: '15', seconds: '22', }, startCounter: function () { let runningCounter = setInterval(() =>
                { let countDownDate = new Date(1591892122 * 1000).getTime(); let timeDistance = countDownDate - new Date().getTime(); if (timeDistance 
                < 0) { clearInterval(runningCounter); return; } this.timer.days = this.formatCounter(Math.floor(timeDistance / (1000 * 60 * 60 * 24))); this.timer.hours = this.formatCounter(Math.floor((timeDistance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))); this.timer.minutes = this.formatCounter(Math.floor((timeDistance % (1000 * 60 * 60)) / (1000 * 60))); this.timer.seconds = this.formatCounter(Math.floor((timeDistance % (1000 * 60)) / 1000)); }, 1000); }, formatCounter: function (number) { return number.toString().padStart(2, '0'); }
            }
            " x-init="startCounter()">
                    <span x-text="timer.days">00</span>
                : <span x-text="timer.hours">23</span>
                : <span x-text="timer.minutes">15</span>
                : <span x-text="timer.seconds">22</span>
                
               
            </div>
            HTML;

    assertComponentRenders($expected, '<x-countdown :expires="new Carbon\Carbon(\'2020-06-11 17:15:22\', \'CET\')"/>');
});

test('the component can be slotted', function () {
    Carbon::setTestNow(new Carbon('2020-06-10 18:00:00', 'CET'));

    $template = <<<HTML
            <x-countdown :expires="new Carbon\Carbon('2020-06-11 17:15:22', 'CET')">
                <span x-text="timer.days">00</span> days
                <span x-text="timer.hours">23</span> hours
                <span x-text="timer.minutes">15</span> minutes
                <span x-text="timer.seconds">22</span> seconds
            </x-countdown>
            HTML;

    $expected = <<<'HTML'
            <div x-data="
            { timer: { days: '00', hours: '23', minutes: '15', seconds: '22', }, startCounter: function () { let runningCounter = setInterval(() =>
                { let countDownDate = new Date(1591892122 * 1000).getTime(); let timeDistance = countDownDate - new Date().getTime(); if (timeDistance 
                < 0) { clearInterval(runningCounter); return; } this.timer.days = this.formatCounter(Math.floor(timeDistance / (1000 * 60 * 60 * 24))); this.timer.hours = this.formatCounter(Math.floor((timeDistance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))); this.timer.minutes = this.formatCounter(Math.floor((timeDistance % (1000 * 60 * 60)) / (1000 * 60))); this.timer.seconds = this.formatCounter(Math.floor((timeDistance % (1000 * 60)) / 1000)); }, 1000); }, formatCounter: function (number) { return number.toString().padStart(2, '0'); }
            }
            " x-init="startCounter()">
                    <span x-text="timer.days">00</span>
                days <span x-text="timer.hours">23</span>
                hours <span x-text="timer.minutes">15</span>
                minutes <span x-text="timer.seconds">22</span>
                seconds 
               
            </div>
            HTML;

    assertComponentRenders($expected, $template);
});
