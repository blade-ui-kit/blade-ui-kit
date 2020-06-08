<?php

declare(strict_types=1);

namespace BladeUI\Buttons;

use BladeUI\Component;

class Logout extends Component
{
    /** @var string */
    public $action;

    public function __construct(string $action = null)
    {
        $this->action = $action ?? route('logout');
    }

    public function render()
    {
        return view('blade-ui::components.buttons.logout');
    }
}
