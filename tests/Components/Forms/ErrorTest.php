<?php
  
declare(strict_types=1);

test('the component can be rendered', function () {
    $this->withViewErrors(['first_name' => 'Incorrect first name.']);

    expect($this->blade('<x-error field="first_name" class="text-red-500"/>'))->toMatchSnapshot();
});

it('can be slotted', function () {
    $this->withViewErrors(['first_name' => ['Incorrect first name.', 'Needs at least 5 characters.']]);

    $template = <<<'HTML'
            <x-error field="first_name">
                <ul>
                    @foreach ($component->messages($errors) as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-error>
            HTML;

    expect($this->blade($template))->toMatchSnapshot();
});
