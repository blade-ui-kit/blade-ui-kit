<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Maps;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class GoogleMap extends BladeComponent
{
    /** @var string */
    public $id;

    /** @var array */
    public $center;

    /** @var int */
    public $zoom;

    /** @var array */
    public $options;

    /** @var array */
    public $markers;

    protected static $assets = ['alpine', 'google-maps'];

    public function __construct(
        string $id = 'map',
        array $center = [33.7633864,-84.3973038],
        int $zoom = 15,
        array $options = [],
        array $markers = []
    ) {
        $this->id = $id;
        $this->center = $center;
        $this->zoom = $zoom;
        $this->options = $options;
        $this->markers = $markers;
    }

    public function googleMarkers()
    {
        return collect($this->markers)->map(function ($marker) {
            return [
                'lat' => $marker[0],
                'lng' => $marker[1]
            ];
        });
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.maps.google-map');
    }

    public function options(): array
    {
        return array_merge([
            'center' => [
                'lat' => $this->center[0],
                'lng' => $this->center[1]
            ],
            'zoom' => $this->zoom
        ], $this->options);
    }
}
