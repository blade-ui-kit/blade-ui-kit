<?php

declare(strict_types=1);

namespace BladeUI\Editors;

use BladeUI\Component;
use Illuminate\Contracts\View\View;

class EasyMDE extends Component
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    public function __construct(string $name, string $id = null)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
    }

    public function render(): View
    {
        return view('blade-ui::components.editors.easy-mde');
    }

    public static function styles(): array
    {
        return ['https://unpkg.com/easymde/dist/easymde.min.css'];
    }

    public static function scripts(): array
    {
        return ['https://unpkg.com/easymde/dist/easymde.min.js'];
    }
}
