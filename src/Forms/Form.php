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

    /** @var bool */
    public $hasFiles;

    public function __construct(string $action, string $method = 'POST', bool $hasFiles = false)
    {
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->hasFiles = $hasFiles;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.forms.form');
    }
}
