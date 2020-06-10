<?php

declare(strict_types=1);

namespace BladeUI\Support;

use BladeUI\Component;
use Illuminate\Contracts\View\View;

class Unavatar extends Component
{
    /** @var string */
    public $src;

    /** @var string */
    public $provider;

    /** @var string */
    public $fallback;

    public function __construct(string $src, string $provider = '', string $fallback = '')
    {
        $this->src = $src;
        $this->provider = $provider;
        $this->fallback = $fallback;
    }

    public function render(): View
    {
        return view('blade-ui::components.support.unavatar');
    }

    public function unavatarUrl(): string
    {
        $query = http_build_query(array_filter([
            'fallback' => $this->fallback,
        ]));

        if ($this->provider) {
            return sprintf('https://unavatar.now.sh/%s/%s?%s', $this->provider, $this->src, $query);
        }

        return sprintf('https://unavatar.now.sh/%s?%s', $this->src, $query);
    }
}
