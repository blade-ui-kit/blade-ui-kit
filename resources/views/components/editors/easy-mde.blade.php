<textarea
    x-data
    x-init="new EasyMDE({ element: $el {{ $jsonOptions() }} })"
    name="{{ $name }}"
    id="{{ $id }}"
    {{ $attributes }}
>{{ old(Str::dot($name), $slot) }}</textarea>
