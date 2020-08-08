<?php

declare(strict_types=1);

namespace BladeUIKit\DateTime;

use BladeUIKit\BladeComponent;
use Carbon\CarbonInterface;
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
        CarbonInterface $date,
        string $format = 'Y-m-d H:i:s',
        bool $human = false,
        bool $local = null
    ) {
        $this->date = $date;
        $this->format = $format;
        $this->human = $human;
        $this->local = $local;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.date-time.date-time');
    }
}
