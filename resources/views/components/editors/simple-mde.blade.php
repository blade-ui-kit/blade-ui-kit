<textarea
    name="{{ $name }}"
    id="{{ $id }}"
    {{ $attributes }}
>{{ old($name, $slot) }}</textarea>

<script>
    window.onload = function () {
        var simplemde = new SimpleMDE({
            element: document.getElementById("{{ $id }}")
        });
    }
</script>
