<textarea
    x-data
    x-init="new EasyMDE({ element: $el {{ $jsonOptions() }} })"
    name="{{ $name }}"
    id="{{ $id }}"
    {{ $attributes }}
>{{ old($dotName, $slot) }}</textarea>
