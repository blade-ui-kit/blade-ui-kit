<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;

class ColorPicker extends Input
{
    /** @var array */
    public $options;

    protected static $assets = ['alpine', 'pickr'];

    public function __construct(string $name, string $id = null, ?string $value = '', array $options = [])
    {
        parent::__construct($name, $id, 'hidden', $value);

        /**
         * The default option was overwriting the value from old() input when $options is merged with\
         * the options() array.
         * Instead, if there's a value from $this->value, it's gonna overwrite the default value in $options.
         */
        if (! empty($this->value) && ! empty($options['default'])) {
            $options['default'] = $this->value;
        }

        $this->options = $options;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.forms.inputs.color-picker');
    }

    public function options(): array
    {
        return array_merge([
            'el' => '#'.$this->id,
            'default' => $this->value,
            'theme' => 'classic',
            'swatches' => $this->swatches(),
            'components' => [
                'preview' => true,
                'interaction' => [
                    'hex' => true,
                    'input' => true,
                    'clear' => true,
                    'save' => true,
                ],
            ],
        ], $this->options);
    }

    protected function swatches(): array
    {
        return [
            '000000',
            'A0AEC0',
            'F56565',
            'ED8936',
            'ECC94B',
            '48BB78',
            '38B2AC',
            '4299E1',
            '667EEA',
            '9F7AEA',
            'ED64A6',
            'FFFFFF',
        ];
    }
}
