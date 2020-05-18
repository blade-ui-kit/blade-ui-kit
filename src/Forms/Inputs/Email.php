<?php

declare(strict_types=1);

namespace BladeUI\Forms\Inputs;

use Illuminate\Contracts\View\View;

class Email extends Input
{
    public function __construct(string $name = 'email', string $id = null, $value = null)
    {
        parent::__construct($name, $id, 'email', $value);
    }

    public function render(): View
    {
        return view('blade-ui::components.forms.inputs.email');
    }
}
