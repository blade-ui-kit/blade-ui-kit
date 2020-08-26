<?php

declare(strict_types=1);

namespace BladeUIKit\Components\DateTime;

use BladeUIKit\Components\BladeComponent;
use Carbon\Carbon as CarbonAlias;
use Carbon\CarbonInterface;
use DateTimeInterface;
use Illuminate\Contracts\View\View;

class Carbon extends BladeComponent
{
    /** @var CarbonInterface */
    public $date;

    /** @var string */
    public $format;

    /** @var bool */
    public $human;

    /** @var string|null */
    public $local;

    protected static $assets = ['moment'];

    public function __construct(
        DateTimeInterface $date,
        string $format = 'Y-m-d H:i:s',
        bool $human = false,
        $local = null
    ) {
        $this->date = CarbonAlias::instance($date);
        $this->format = $format;
        $this->human = $human;
        $this->local = $local;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.date-time.carbon');
    }
}
