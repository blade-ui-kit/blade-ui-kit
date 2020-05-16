<?php

declare(strict_types=1);

namespace BladeUI\Buttons;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Submit extends Component
{
    public function render(): View
    {
        return view('blade-ui::components.buttons.submit');
    }
}
