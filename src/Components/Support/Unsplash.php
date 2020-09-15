<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Support;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Unsplash extends BladeComponent
{
    /** @var string */
    protected $photo;

    /** @var string */
    protected $query;

    /** @var bool */
    protected $featured;

    /** @var string */
    protected $username;

    /** @var int|null */
    protected $width;

    /** @var int|null */
    protected $height;

    /** @var int */
    protected $ttl;

    public function __construct(
        string $photo = 'random',
        string $query = '',
        bool $featured = false,
        string $username = '',
        int $width = null,
        int $height = null,
        int $ttl = 3600
    ) {
        $this->photo = $photo;
        $this->query = $query;
        $this->featured = $featured;
        $this->username = $username;
        $this->width = $width;
        $this->height = $height;
        $this->ttl = $ttl;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.support.unsplash', [
            'url' => $this->fetchPhoto(),
        ]);
    }

    protected function fetchPhoto(): string
    {
        if (! $accessKey = config('services.unsplash.access_key')) {
            return '';
        }

        $photo = Cache::remember('unsplash.'.$this->photo, $this->ttl, function () use ($accessKey) {
            return Http::get("https://api.unsplash.com/photos/{$this->photo}", array_filter([
                'client_id' => $accessKey,
                'query' => $this->query,
                'featured' => $this->featured,
                'username' => $this->username,
            ]))->json()['urls']['raw'];
        });

        if ($this->width || $this->height) {
            $photo .= '&'.Arr::query(array_filter([
                'w' => $this->width,
                'h' => $this->height,
            ]));
        }

        return $photo;
    }
}
