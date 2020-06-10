<input
    name="{{ $name }}"
    type="text"
    id="{{ $id }}"
    placeholder="{{ $placeholder }}"
    value="{{ old($name, $value) }}"
    {{ $attributes }}
/>

<script>
    window.onload = function () {
        var picker = new Pikaday({
            field: document.getElementById('{{ $id }}'),
            format: '{{ $format }}'
        });
    }
</script>
