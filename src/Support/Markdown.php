<?php

declare(strict_types=1);

namespace BladeUI\Support;

use BladeUI\Component;
use Illuminate\Contracts\View\View;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use League\CommonMark\MarkdownConverterInterface;

class Markdown extends Component
{
    /** @var string */
    protected $flavor;

    /** @var string */
    protected $htmlInput;

    /** @var bool */
    protected $allowUnsafeLinks;

    public function __construct(string $flavor = 'default', string $htmlInput = 'strip', bool $allowUnsafeLinks = false)
    {
        $this->flavor = $flavor;
        $this->htmlInput = $htmlInput;
        $this->allowUnsafeLinks = $allowUnsafeLinks;
    }

    public function render(): View
    {
        return view('blade-ui::components.support.markdown');
    }

    public function toHtml(string $markdown): string
    {
        return $this->converter()->convertToHtml($markdown);
    }

    private function converter(): MarkdownConverterInterface
    {
        $options = [
            'html_input' => $this->htmlInput,
            'allow_unsafe_links' => $this->allowUnsafeLinks,
        ];

        if ($this->flavor === 'github') {
            return new GithubFlavoredMarkdownConverter($options);
        }

        return new CommonMarkConverter($options);
    }
}
