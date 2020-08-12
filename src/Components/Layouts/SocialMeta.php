<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Layouts;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class SocialMeta extends BladeComponent
{
    /** @var string */
    public $title;

    /** @var string */
    public $description;

    /** @var string */
    public $type;

    /** @var string */
    public $card;

    /** @var string */
    public $image;

    /** @var string */
    public $url;

    public function __construct(
        string $title,
        string $description = '',
        string $type = 'website',
        string $card = 'summary_large_image',
        string $image = '',
        string $url = ''
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->type = $type;
        $this->card = $card;
        $this->image = $image;
        $this->url = $url ?: url()->current();
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.layouts.social-meta');
    }
}
