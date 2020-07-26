<?php

declare(strict_types=1);

namespace BladeUI\Forms;

use BladeUI\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class Label extends Component
{
    /** @var string */
    public $for;

    public function __construct(string $for)
    {
        $this->for = $for;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.forms.label');
    }

    public function fallback(): string
    {
        return Str::ucfirst(str_replace('_', ' ', $this->for));
    }
}
