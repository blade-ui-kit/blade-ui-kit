<textarea
    x-data
    x-init="new EasyMDE({ element: $el })"
    name="{{ $name }}"
    id="{{ $id }}"
    {{ $attributes }}
>{{ old($name, $slot) }}</textarea>
