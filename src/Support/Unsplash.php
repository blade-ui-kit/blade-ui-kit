<?php

declare(strict_types=1);

namespace BladeUI\Support;

use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class Unsplash extends Component
{
    /** @var string */
    protected $photoId;

    /** @var string */
    protected $query;

    /** @var bool */
    protected $featured;

    /** @var string */
    protected $username;

    /** @var int */
    protected $w;

    /** @var int */
    protected $h;

    /** @var int */
    protected $cacheTtl;

    public function __construct(
        string $photoId = 'random',
        string $query = '',
        bool $featured = false,
        string $username = '',
        int $w = 0,
        int $h = 0,
        int $cacheTtl = 3600
    ) {
        $this->photoId = $photoId;
        $this->query = $query;
        $this->featured = $featured;
        $this->username = $username;
        $this->w = $w;
        $this->h = $h;
        $this->cacheTtl = $cacheTtl;
    }

    public function render(): View
    {
        $url = $this->fetchPhoto();

        return view('blade-ui::components.support.unsplash', [
            'url' => $url,
        ]);
    }

    /**
     * @throws \Exception
     */
    private function fetchPhoto(): string
    {
        if (! $accessKey = config('services.unsplash.access_key')) {
            throw new Exception('Please define your Unsplash access key in the services.php config file.');
        }

        return Cache::remember($this->photoId, $this->cacheTtl, function () use ($accessKey) {
            return Http::get("https://api.unsplash.com/photos/{$this->photoId}", array_filter([
                'client_id' => $accessKey,
                'query' => $this->query,
                'featured' => $this->featured,
                'username' => $this->username,
                'w' => $this->w,
                'h' => $this->h,
            ]))->json()['urls']['raw'];
        });
    }
}
