<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Editors;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class Trix extends BladeComponent
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var string */
    public $trixClass;

    protected static $assets = ['trix'];

    public function __construct(string $name, string $id = null, string $trixClass = 'trix-content')
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->trixClass = $trixClass;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.editors.trix');
    }
}
