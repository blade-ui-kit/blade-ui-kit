<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Forms;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class Form extends BladeComponent
{
    /** @var string|null */
    public $action;

    /** @var string */
    public $method;

    /** @var bool */
    public $hasFiles;

    public function __construct(string $action = null, string $method = 'POST', bool $hasFiles = false)
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
