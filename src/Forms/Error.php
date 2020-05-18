<?php

declare(strict_types=1);

namespace BladeUI\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;

class Error extends Component
{
    /** @var string */
    public $field;

    public function __construct(string $field)
    {
        $this->field = $field;
    }

    public function render(): View
    {
        return view('blade-ui::components.forms.error');
    }
}
