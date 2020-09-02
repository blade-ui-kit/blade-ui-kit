<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;

class File extends Input
{
    public $label;
    public $buttonContainerClass;
    public $fileContainerClass;

    public function __construct(string $value='', string $name = 'file', $label= 'Choose File', $buttonContainerClass = '', $fileContainerClass = '')
    {
        parent::__construct($name, 'file', 'file', $value);

        $this->label = $label;
        $this->fileContainerClass = $fileContainerClass;
        $this->buttonContainerClass = $buttonContainerClass;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.forms.inputs.file');
    }
}
