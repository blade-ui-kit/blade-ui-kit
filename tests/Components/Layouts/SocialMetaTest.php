<?php
  
declare(strict_types=1);

it('can render to html', function () {
    $template = <<<'HTML'
            <x-social-meta
                title="Hello World"
                description="Blade components are awesome!"
                card="summary"
                image="http://example.com/social.jpg"
            />
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});
