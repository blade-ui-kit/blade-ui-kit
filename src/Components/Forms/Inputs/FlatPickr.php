<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;

class FlatPickr extends Input
{
    /** @var string */
    public $format;

    /** @var string */
    public $placeholder;

    /** @var array */
    public $options;

    protected static $assets = ['alpine', 'flat-pickr'];

    public function __construct(
        string $name,
        string $id = null,
        ?string $value = '',
        string $format = 'Y-m-d H:i',
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
            'dateFormat' => $this->format,
            'altInput' => true,
            'enableTime' => true,
        ], $this->options);
    }

    public function jsonOptions(): string
    {
        if (empty($this->options())) {
            return '';
        }

        return json_encode((object) $this->options());
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.forms.inputs.flat-pickr');
    }
}
