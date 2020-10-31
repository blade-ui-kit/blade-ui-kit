<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;

class Pikaday extends Input
{
    /** @var string */
    public $format;

    /** @var string */
    public $placeholder;

    /** @var array */
    public $options;

    protected static $assets = ['alpine', 'moment', 'pikaday'];

    public function __construct(
        string $name,
        string $id = null,
        ?string $value = '',
        string $format = 'DD/MM/YYYY',
        string $placeholder = null,
        array $options = []
    ) {
        parent::__construct($name, $id, 'text', $value);

        $this->format = $format;
        $this->placeholder = $placeholder ?? $format;
        $this->options = $options;
    }

    public function options(): array
    {
        return array_merge([
            'format' => $this->format,
        ], $this->options);
    }

    public function jsonOptions(): string
    {
        if (empty($this->options())) {
            return '';
        }

        return ', ...'.json_encode((object) $this->options());
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.forms.inputs.pikaday');
    }
}
