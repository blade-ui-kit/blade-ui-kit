<textarea
    name="{{ $name }}"
    id="{{ $id }}"
    rows="{{ $rows }}"
    {{ $attributes }}
>{{ old(Str::dot($name), $slot) }}</textarea>
