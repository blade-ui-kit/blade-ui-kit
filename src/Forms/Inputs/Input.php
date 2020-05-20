<?php

declare(strict_types=1);

namespace BladeUI\Forms\Inputs;

use BladeUI\Component;
use Illuminate\Contracts\View\View;

class Input extends Component
{
    /** @var string */
    public $name;

    /** @var string|null */
    public $id;

    /** @var string|null */
    public $type;

    /** @var null */
    public $value;

    public function __construct(string $name, string $id = null, string $type = 'text', $value = null)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->type = $type;
        $this->value = old($name, $value);
    }

    public function render(): View
    {
        return view('blade-ui::components.forms.inputs.input');
    }
}
