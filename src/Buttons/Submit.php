<?php

declare(strict_types=1);

namespace BladeUI\Buttons;

use Illuminate\Contracts\View\View;

class Submit extends Button
{
    public function __construct()
    {
        parent::__construct('submit');
    }

    public function render(): View
    {
        return view('blade-ui::components.buttons.submit');
    }
}
