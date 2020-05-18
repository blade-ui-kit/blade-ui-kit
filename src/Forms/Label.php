<?php

declare(strict_types=1);

namespace BladeUI\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

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
        return view('blade-ui::components.forms.label');
    }

    public function fallback()
    {
        return Str::ucfirst(str_replace('_', ' ', $this->for));
    }
}
