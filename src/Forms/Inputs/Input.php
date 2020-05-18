<?php

declare(strict_types=1);

namespace BladeUI\Forms\Inputs;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /** @var string */
    public $name;

    /** @var string|null */
    public $id;

    /** @var string|null */
    public $type;

    public function __construct(string $name, string $id = null, string $type = 'text')
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->type = $type;
    }

    public function render(): View
    {
        return view('blade-ui::components.forms.inputs.input');
    }
}
