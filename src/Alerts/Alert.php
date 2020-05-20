<?php

declare(strict_types=1);

namespace BladeUI\Alerts;

use BladeUI\Component;
use Illuminate\Contracts\View\View;

class Alert extends Component
{
    /** @var string */
    public $type;

    public function __construct(string $type = 'success')
    {
        $this->type = $type;
    }

    public function render(): View
    {
        return view('blade-ui::components.alerts.alert');
    }

    public function message(): string
    {
        return (string) session()->get($this->type);
    }

    public function flash(): string
    {
        return (string) session()->pull($this->type);
    }
}
