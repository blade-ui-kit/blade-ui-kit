<?php

declare(strict_types=1);

namespace BladeUI\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;

class Error extends Component
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
        return view('blade-ui::components.forms.error');
    }
}
