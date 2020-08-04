<?php

declare(strict_types=1);

namespace BladeUIKit\Editors;

use BladeUIKit\Component;
use Illuminate\Contracts\View\View;

class EasyMDE extends Component
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    protected static $assets = ['alpine', 'easy-mde'];

    public function __construct(string $name, string $id = null)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.editors.easy-mde');
    }
}
