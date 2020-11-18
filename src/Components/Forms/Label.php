<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Forms;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class Label extends BladeComponent
{
    /** @var string */
    public $for;

    /** @var string|null */
    public $fallback;

    public function __construct(string $for, string $fallback = null)
    {
        $this->for = $for;
        $this->fallback = $fallback;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.forms.label');
    }

    public function fallback(): string
    {
        return $this->fallback ?? Str::ucfirst(str_replace('_', ' ', $this->for));
    }
}
