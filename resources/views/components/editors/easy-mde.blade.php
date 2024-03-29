<textarea
    x-data
    x-init="new EasyMDE({ element: $root {{ $jsonOptions() }} })"
    name="{{ $name }}"
    id="{{ $id }}"
    {{ $attributes }}
>{{ old($name, $slot) }}</textarea>
