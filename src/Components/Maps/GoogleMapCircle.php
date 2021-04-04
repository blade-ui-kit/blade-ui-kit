<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Maps;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class GoogleMapCircle extends BladeComponent
{
    /** @var array */
    public $center;

    /** @var int */
    public $radius;

    /** @var string */
    public $colour;

    public function __construct(
        array $center,
        int $radius = 10,
        string $colour = '#E02424'
    ) {
        $this->center = $center;
        $this->radius = $radius;
        $this->colour = $colour;
    }

    public function googleCenter()
    {
        return json_encode([
            'lat' => $this->center[0],
            'lng' => $this->center[1]
        ]);
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.maps.google-map-circle');
    }
}
