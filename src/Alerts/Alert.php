<?php

declare(strict_types=1);

namespace BladeUI\Alerts;

use BladeUI\Component;
use Illuminate\Contracts\View\View;

class Alert extends Component
{
    /** @var string */
    public $type;

    public function __construct(string $type = 'status')
    {
        $this->type = $type;
    }

    public function render(): View
    {
        return view('blade-ui::components.alerts.alert');
    }

    public function message()
    {
        return session()->get($this->type);
    }
}
