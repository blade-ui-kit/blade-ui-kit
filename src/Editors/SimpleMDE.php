<?php

declare(strict_types=1);

namespace BladeUI\Editors;

use BladeUI\Component;

class SimpleMDE extends Component
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

    public function render()
    {
        return view('blade-ui::components.editors.simple-mde');
    }

    public static function styles(): array
    {
        return ['https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css'];
    }

    public static function scripts(): array
    {
        return ['https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js'];
    }
}
