<?php

declare(strict_types=1);

it('can render', function () {
    $template = <<<'HTML'
            <x-dropdown class="text-gray-500">
                <x-slot name="trigger">
                    <button>Dries</button>
                </x-slot>

                <a href="#">Profile</a>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
            </x-html>
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});
