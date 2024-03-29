<input
    x-data
    x-init="new Pikaday({ field: $root {{ $jsonOptions() }} })"
    name="{{ $name }}"
    type="text"
    id="{{ $id }}"
    placeholder="{{ $placeholder }}"
    @if($value)value="{{ $value }}"@endif
    {{ $attributes }}
/>
