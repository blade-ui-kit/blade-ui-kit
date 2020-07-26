<?php

declare(strict_types=1);

namespace BladeUIKit\Layouts;

use BladeUIKit\Component;
use Illuminate\Contracts\View\View;

class Html extends Component
{
    /** @var string */
    protected $title;

    public function __construct(string $title = '')
    {
        $this->title = $title;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.layouts.html');
    }

    public function title(): string
    {
        return $this->title ?: (string) config('app.name', 'Laravel');
    }
}
