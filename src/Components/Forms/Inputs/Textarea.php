<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Forms\Inputs;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class Textarea extends BladeComponent
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var int */
    public $rows;

    public function __construct(string $name, string $id = null, $rows = 3)
    {
        $this->name = $name;
        $this->id = $id ?? str_replace('.', '_', Str::dot($name));
        $this->rows = $rows;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.forms.inputs.textarea');
    }
}
