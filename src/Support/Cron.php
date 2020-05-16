<?php

declare(strict_types=1);

namespace BladeUI\Support;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Lorisleiva\CronTranslator\CronTranslator;

class Cron extends Component
{
    /** @var string */
    public $schedule;

    public function __construct(string $schedule)
    {
        $this->schedule = $schedule;
    }

    public function render(): View
    {
        return view('blade-ui::components.support.cron');
    }

    public function translate(): string
    {
        return CronTranslator::translate($this->schedule);
    }
}
