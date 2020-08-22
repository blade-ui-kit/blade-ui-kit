<input
    x-data
    x-init="new Pikaday({ field: $el {{ $jsonOptions() }} })"
    name="{{ $name }}"
    type="text"
    id="{{ $id }}"
    placeholder="{{ $placeholder }}"
    @if($value)value="{{ $value }}"@endif
    {{ $attributes }}
/>
