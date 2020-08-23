<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;

class Checkbox extends Input
{
    /** @var bool */
    public $checked;

    public function __construct(string $name, string $id = null, bool $checked = false)
    {
        parent::__construct($name, $id, 'checkbox');

        $this->checked = (bool) old($name, $checked);
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.forms.inputs.checkbox');
    }
}
