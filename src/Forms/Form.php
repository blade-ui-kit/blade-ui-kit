<?php

declare(strict_types=1);

namespace BladeUI\Forms;

use BladeUI\Component;
use Illuminate\Contracts\View\View;

class Form extends Component
{
    /** @var string */
    public $action;

    /** @var string */
    public $method;

    public function __construct(string $action, string $method = 'POST')
    {
        $this->action = $action;
        $this->method = $method;
    }

    public function render(): View
    {
        return view('blade-ui::components.forms.form');
    }
}
