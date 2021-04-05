<?php


namespace BladeUIKit\Components\Forms\Inputs;


use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class Filepond extends BladeComponent
{
    /** @var array */
    public $options;

    protected static $assets = ['alpine', 'filepond'];

    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function render() :View
    {
        return view('blade-ui-kit::components.forms.inputs.filepond');
    }

    public function options(): array
    {
        return array_merge([], $this->options);
    }

    public function jsonOptions(): string
    {
        if (empty($this->options())) {
            return '{}';
        }

        return addslashes(preg_replace('~[\t\r\n]+~', '', json_encode($this->options())));
    }
}
