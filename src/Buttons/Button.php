<?php

declare(strict_types=1);

namespace BladeUI\Buttons;

use BladeUI\Component;
use Illuminate\Contracts\View\View;

class Button extends Component
{
    /** @var string */
    public $type;

    public function __construct(string $type = 'button')
    {
        $this->type = $type;
    }

    public function render(): View
    {
        return view('blade-ui::components.buttons.button');
    }
}
