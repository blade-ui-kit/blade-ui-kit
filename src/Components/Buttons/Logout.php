<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Buttons;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class Logout extends BladeComponent
{
    /** @var string */
    public $action;

    public function __construct(string $action = null)
    {
        $this->action = $action ?? route('logout');
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.buttons.logout');
    }
}
