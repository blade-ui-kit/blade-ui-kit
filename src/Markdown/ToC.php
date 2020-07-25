<?php

declare(strict_types=1);

namespace BladeUI\Markdown;

use BladeUI\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ToC extends Component
{
    /** @var string */
    public $url;

    public function __construct($url = null)
    {
        $this->url = $url ?? '';
    }

    public function render(): View
    {
        return view('blade-ui::components.markdown.toc');
    }

    public function items(string $markdown): Collection
    {
        return collect(explode(PHP_EOL, $markdown))
            ->reject(function (string $line) {
                // Only search for level 2 and 3 headings.
                return ! Str::startsWith($line, '## ') && ! Str::startsWith($line, '### ');
            })
            ->map(function (string $line) {
                return [
                    'level' => strlen(trim(Str::before($line, '# '))) + 1,
                    'title' => $title = trim(Str::after($line, '# ')),
                    'anchor' => Str::slug($title),
                ];
            });
    }
}
