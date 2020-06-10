<?php

declare(strict_types=1);

namespace BladeUI\Editors;

use BladeUI\Component;

class Trix extends Component
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var string */
    public $styling;

    public function __construct(string $name, string $id = null, string $styling = 'trix-content')
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->styling = $styling;
    }

    public function render()
    {
        return view('blade-ui::components.editors.trix');
    }

    public static function styles(): array
    {
        return ['https://unpkg.com/trix@1.2.3/dist/trix.css'];
    }

    public static function scripts(): array
    {
        return ['https://unpkg.com/trix@1.2.3/dist/trix.js'];
    }
}
