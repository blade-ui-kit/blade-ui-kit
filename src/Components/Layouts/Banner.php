<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Layouts;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class Banner extends BladeComponent
{
    /** @var string */
    public $sessionStorageName = 'blade-ui-kit-banner-dismiss';

    /** @var string */
    public $triggerClass;

    public function __construct(
        string $sessionStorageName = null,
        string $triggerClass = null
    ) {
        if ($sessionStorageName) {
            $this->sessionStorageName = $sessionStorageName;
        }

        if ($triggerClass) {
            $this->triggerClass = $triggerClass;
        }
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.layouts.banner');
    }
}
