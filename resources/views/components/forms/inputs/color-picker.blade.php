<div
    x-data="{
        initPickr: function (element) {
            let pickr = Pickr.create({{ json_encode($options()) }});
            let input = document.getElementById('{{ $id . '-input' }}');

            pickr.on('save', function (color) {
                let currentColor = color ? color.toHEXA().toString() : '';

                input.setAttribute('value', currentColor);
                element.setAttribute('title', currentColor);
            });
        }
    }"
    x-init="initPickr($el)"
    {{ $attributes->merge(['title' => $value]) }}
>
    <div id="{{ $id }}"></div>

    <input
        id="{{ $id }}-input"
        name="{{ $name }}"
        type="hidden"
        {{-- If there's no value from old(), use value from the default option instead. --}}
        @if(!empty($value))value="{{ $value }}"@elseif(!empty($options()['default']))value="{{ $options()['default'] }}"@endif
    />
</div>