<input
    x-data
    x-init="new Pikaday({ field: $el, format: '{{ $format }}' })"
    name="{{ $name }}"
    type="text"
    id="{{ $id }}"
    placeholder="{{ $placeholder }}"
    value="{{ old($name, $value) }}"
    {{ $attributes }}
/>
