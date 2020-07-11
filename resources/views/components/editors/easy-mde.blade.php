<textarea
    name="{{ $name }}"
    id="{{ $id }}"
    {{ $attributes }}
>{{ old($name, $slot) }}</textarea>

<script>
    window.onload = function () {
        var easyMDE = new EasyMDE({
            element: document.getElementById("{{ $id }}")
        });
    }
</script>
