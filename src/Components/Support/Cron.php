<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Support;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;
use Lorisleiva\CronTranslator\CronTranslator;

class Cron extends BladeComponent
{
    /** @var string */
    public $schedule;

    /** @var bool */
    public $human = false;

    /** @var string */
    public $locale = 'en';

    /** @var bool */
    public $use24hour = false;

    public function __construct(string $schedule, bool $human = false, string $locale = 'en', bool $use24hour = false)
    {
        $this->schedule = $schedule;
        $this->locale = $locale;
        $this->use24hour = $use24hour;
        $this->human = $human;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.support.cron');
    }

    public function translate(): string
    {
        return CronTranslator::translate($this->schedule, $this->locale, $this->use24hour);
    }
}
