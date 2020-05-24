<?php

declare(strict_types=1);

namespace BladeUI\Forms\Inputs;

use BladeUI\Component;
use Illuminate\Contracts\View\View;

class Textarea extends Component
{
    /** @var string */
    public $name;

    /** @var string|null */
    public $id;

    /** @var int */
    public $rows;

    public function __construct(string $name, string $id = null, $rows = 3)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->rows = $rows;
    }

    public function render(): View
    {
        return view('blade-ui::components.forms.inputs.textarea');
    }
}
