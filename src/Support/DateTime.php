<?php

declare(strict_types=1);

namespace BladeUI\Support;

use Carbon\Carbon;
use Illuminate\View\Component;

final class DateTime extends Component
{
    /** @var Carbon */
    public $date;

    /** @var string */
    public $format;

    public function __construct(Carbon $date, string $format = 'Y-m-d H:i:s')
    {
        $this->date = $date;
        $this->format = $format;
    }

    public function render()
    {
        return view('blade-ui::components.support.date-time');
    }
}
