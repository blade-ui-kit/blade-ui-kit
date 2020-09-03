<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Maps;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class GoogleMapMarker extends BladeComponent
{
    /** @var array */
    public $position;

    public function __construct(
        array $position
    ) {
        $this->position = $position;
    }

    public function googlePosition()
    {
        return json_encode([
            'lat' => $this->position[0],
            'lng' => $this->position[1]
        ]);
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.maps.google-map-marker');
    }
}
