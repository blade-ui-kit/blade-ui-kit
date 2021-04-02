<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;

class Flatpickr extends Input
{
    /** @var string */
    public $format;

    /** @var string */
    public $placeholder;

    /** @var string */
    public $enableTime;

    /** @var array */
    public $options;

    protected static $assets = ['alpine', 'moment', 'flatpickr'];

    public function __construct(
        string $name,
        string $id = null,
        ?string $value = '',
        string $format = 'd-m-Y',
        bool $enableTime = false,
        string $placeholder = null,
        array $options = []
    ) {
        parent::__construct($name, $id, 'text', $value);

        $enableTime ? $this->format = $format . ' H:i' : $this->format = $format;
        $this->enableTime = $enableTime;
        $this->placeholder = $placeholder ?? $this->format;
        $this->options = $options;
    }

    public function options(): array
    {
        return array_merge([
            'dateFormat' => $this->format,
            'enableTime' => $this->enableTime,
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
        return view('blade-ui-kit::components.forms.inputs.flatpickr');
    }
}
