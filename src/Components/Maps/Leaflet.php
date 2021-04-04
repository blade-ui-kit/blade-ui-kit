<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Maps;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class Leaflet extends BladeComponent
{
    /** @var string */
    public $id;

    /** @var string */
    public $basemap;

    /** @var array */
    public $options;

    /** @var array */
    public $markers;

    /** @var array */
    public $center;

    /** @var int */
    public $zoom;

    /** @var bool */
    public $zoomControl;

    protected static $assets = ['alpine', 'leaflet'];

    public function __construct(
        string $id = 'map',
        string $basemap = 'osm',
        array $options = [],
        array $markers = [],
        array $center = [0,0],
        int $zoom = 8,
        bool $zoomControl = false
    ) {
        $this->id = $id;
        $this->basemap = $basemap;
        $this->options = $options;
        $this->markers = $markers;
        $this->center = $center;
        $this->zoom = $zoom;
        $this->zoomControl = $zoomControl;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.maps.leaflet');
    }

    public function options(): array
    {
        return array_merge([
            'center' => array_reverse($this->center),
            'zoom' => $this->zoom,
            'zoomControl' => $this->zoomControl,
        ], $this->options);
    }
}
