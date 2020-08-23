<?php

declare(strict_types=1);

namespace BladeUIKit\Components\DateTime;

use BladeUIKit\Components\BladeComponent;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use DateTimeInterface;
use Illuminate\Contracts\View\View;

class DateTime extends BladeComponent
{
    /** @var CarbonInterface */
    public $date;

    /** @var string */
    public $format;

    /** @var bool */
    public $human = false;

    /** @var string|null */
    public $local;

    protected static $assets = ['moment'];

    public function __construct(
        DateTimeInterface $date,
        string $format = 'Y-m-d H:i:s',
        bool $human = false,
        $local = null
    ) {
        $this->date = Carbon::instance($date);
        $this->format = $format;
        $this->human = $human;
        $this->local = $local;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.date-time.date-time');
    }
}
