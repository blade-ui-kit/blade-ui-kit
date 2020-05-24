<textarea
    name="{{ $name }}"
    id="{{ $id }}"
    rows="{{ $rows }}"
    {{ $attributes }}
>{{ old($name, $slot) }}</textarea>
