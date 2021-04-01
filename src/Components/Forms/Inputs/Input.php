<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Forms\Inputs;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class Input extends BladeComponent
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var string */
    public $type;

    /** @var string */
    public $value;

    public function __construct(string $name, string $id = null, string $type = 'text', ?string $value = '')
    {
        $this->name = $name;
        $this->id = $id ?? str_replace('.', '_', Str::dot($name));
        $this->type = $type;
        $this->value = old(Str::dot($name), $value ?? '');
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.forms.inputs.input');
    }
}
