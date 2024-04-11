<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Maps;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class GoogleMapPolygon extends BladeComponent
{
    /** @var array */
    public $path;

    /** @var int */
    public $radius;

    /** @var string */
    public $colour;

    public function __construct(
        array $path,
        int $radius = 10,
        string $colour = '#E02424'
    ) {
        $this->path = $path;
        $this->radius = $radius;
        $this->colour = $colour;
    }

    public function googlePath()
    {
        return collect($this->path)->map(function ($point) {
            return [
                'lat' => $point[0],
                'lng' => $point[1]
            ];
        })->toJson();
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.maps.google-map-polygon');
    }
}
