<?php

declare(strict_types=1);

namespace BladeUIKit\Editors;

use BladeUIKit\Component;
use Illuminate\Contracts\View\View;

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

    public function render(): View
    {
        return view('blade-ui-kit::components.editors.trix');
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
