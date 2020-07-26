<input
    x-data="
{
    initPikaday: function () {
        new Pikaday({
            field: document.getElementById('{{ $id }}'),
            format: '{{ $format }}'
        });
    }
}"
    x-init="initPikaday()"
    name="{{ $name }}"
    type="text"
    id="{{ $id }}"
    placeholder="{{ $placeholder }}"
    value="{{ old($name, $value) }}"
    {{ $attributes }}
/>
