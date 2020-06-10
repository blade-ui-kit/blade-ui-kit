<?php

declare(strict_types=1);

namespace BladeUI\Buttons;

use BladeUI\Component;
use Illuminate\Contracts\View\View;

class Logout extends Component
{
    /** @var string */
    public $action;

    public function __construct(string $action = null)
    {
        $this->action = $action ?? route('logout');
    }

    public function render(): View
    {
        return view('blade-ui::components.buttons.logout');
    }
}
