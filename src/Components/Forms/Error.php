<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Forms;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\View;

class Error extends BladeComponent
{
    /** @var string */
    public $field;

    /** @var string */
    public $bag;

    public function __construct(string $field, string $bag = 'default')
    {
        $this->field = $field;
        $this->bag = $bag;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.forms.error');
    }

    public function messages(ViewErrorBag $errors): array
    {
        $bag = $errors->getBag($this->bag);

        return $bag->has($this->field) ? $bag->get($this->field) : [];
    }
}
