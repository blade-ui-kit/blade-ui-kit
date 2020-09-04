<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Forms\Inputs;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class Select extends BladeComponent
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var array */
    public $options;

    /** @var string */
    public $selected;

    /** @var string */
    public $placeholder;

    public function __construct(string $name, string $id = null, array $options = [], string $selected = null, string $placeholder = '')
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->options = $options;
        $this->placeholder = $placeholder;
        $this->selected = old($name, $selected);
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.forms.inputs.select');
    }
}
