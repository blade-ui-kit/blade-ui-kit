<?php

declare(strict_types=1);

namespace BladeUI\Support;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class DateTime extends Component
{
    /** @var Carbon */
    public $date;

    /** @var string */
    public $format;

    /** @var bool */
    public $human = false;

    public function __construct(Carbon $date, string $format = 'Y-m-d H:i:s', bool $human = false)
    {
        $this->date = $date;
        $this->format = $format;
        $this->human = $human;
    }

    public function render(): View
    {
        return view('blade-ui::components.support.date-time');
    }
}
