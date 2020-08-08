<?php

declare(strict_types=1);

namespace BladeUIKit\Navigation;

use BladeUIKit\BladeComponent;
use Illuminate\Contracts\View\View;

class Dropdown extends BladeComponent
{
    protected static $assets = ['alpine'];

    public function render(): View
    {
        return view('blade-ui-kit::components.navigation.dropdown');
    }
}
