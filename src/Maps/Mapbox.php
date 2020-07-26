<?php

declare(strict_types=1);

namespace BladeUIKit\Maps;

use BladeUIKit\Component;
use Illuminate\Contracts\View\View;

class Mapbox extends Component
{
    /** @var string */
    public $id;

    /** @var string */
    public $theme;

    /** @var array */
    public $options;

    /** @var array */
    public $markers;

    public function __construct(
        string $id = 'map',
        string $theme = 'streets-v11',
        array $options = [],
        array $markers = []
    ) {
        $this->id = $id;
        $this->theme = $theme;
        $this->options = $options;
        $this->markers = $markers;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.maps.mapbox');
    }

    public function options(): array
    {
        return array_merge([
            'container' => $this->id,
            'style' => "mapbox://styles/mapbox/{$this->theme}",
        ], $this->options);
    }

    public static function styles(): array
    {
        return [
            'https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css',
        ];
    }

    public static function scripts(): array
    {
        return [
            'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js',
            'https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js',
        ];
    }
}
