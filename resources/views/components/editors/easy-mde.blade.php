<textarea
    x-data="
{
    initEasyMDE: function () {
        new EasyMDE({
            element: document.getElementById('{{ $id }}')
        });
    }
}"
    x-init="initEasyMDE()"
    name="{{ $name }}"
    id="{{ $id }}"
    {{ $attributes }}
>{{ old($name, $slot) }}</textarea>
