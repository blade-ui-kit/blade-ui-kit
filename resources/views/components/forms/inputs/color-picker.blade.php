<div
    x-data="{
        initPickr: function (element) {
            
        }
    }"
    x-init="
        let pickr = Pickr.create({{ json_encode($options()) }});
        let input = document.getElementById('{{ $id . '-input' }}');

        pickr.on('save', function (color) {
            let currentColor = color ? color.toHEXA().toString() : '';

            input.setAttribute('value', currentColor);
            element.setAttribute('title', currentColor);

            $dispatch('buk:color-save', {
                id: '{{ $id }}',
                color: currentColor
            });
        });

        pickr.on('change', function (color) {
            let currentColor = color ? color.toHEXA().toString() : '';

            $dispatch('buk:color-change', {
                id: '{{ $id }}',
                color: currentColor
            });
        });
    "
    {{ $attributes->merge(['title' => $value]) }}
>
    <div id="{{ $id }}"></div>

    <input
        id="{{ $id }}-input"
        name="{{ $name }}"
        type="hidden"
        @if($value)value="{{ $value }}"@endif
    />
</div>
