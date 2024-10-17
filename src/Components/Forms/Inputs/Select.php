<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Forms\Inputs;

use BladeUIKit\Components\BladeComponent;
use http\Exception\InvalidArgumentException;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class Select extends BladeComponent
{
    /** @var string */
    public $name;

    /** @var string|null */
    public $id;

    /** @var array|Collection */
    public $options;

    /** @var string */
    public $nameAttribute;

    /** @var string */
    public $valueAttribute;

    /** @var string|array|null */
    public $selected;

    /** @var string */
    public $placeholder;

    public function __construct(string $name, $options, string $placeholder = '', string $nameAttribute = 'name', string $valueAttribute = 'id', $id = null, $selected = null)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->nameAttribute = $nameAttribute;
        $this->valueAttribute = $valueAttribute;
        $this->selected = $selected;
        $this->placeholder = $placeholder;

        if ($options instanceof Collection) {
            $this->options = $options->mapWithKeys(function ($option) {
                return [$option->{$this->valueAttribute} => $option->{$this->nameAttribute}];
            });
        } elseif (is_array($options)) {
            $this->options = $options;
        } else {
            throw new InvalidArgumentException('Invalid options');
        }
    }

    public function isSelected($value): bool
    {
        $selected = old($this->name, $this->selected);

        if (is_array($selected)) {
            return in_array($value, $selected);
        }

        return ($value === $selected);
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.forms.inputs.select');
    }
}
