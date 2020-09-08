<textarea
    name="{{ $name }}"
    id="{{ $id }}"
    rows="{{ $rows }}"
    {{ $attributes }}
>{{ old($dotName, $slot) }}</textarea>
