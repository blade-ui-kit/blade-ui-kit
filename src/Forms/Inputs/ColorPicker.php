<?php

declare(strict_types=1);

namespace BladeUIKit\Forms\Inputs;

use Illuminate\Contracts\View\View;

class ColorPicker extends Input
{
    /** @var array */
    public $options;

    public function __construct(string $name, string $id = null, string $value = '', array $options = [])
    {
        parent::__construct($name, $id, 'hidden', $value);

        $this->options = $options;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.forms.inputs.color-picker');
    }

    public function options(): array
    {
        return array_merge([
            'el' => '#' . $this->id,
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

    public static function styles(): array
    {
        return [
            'https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css',
        ];
    }

    public static function scripts(): array
    {
        return [
            'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js',
            'https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js',
        ];
    }
}
