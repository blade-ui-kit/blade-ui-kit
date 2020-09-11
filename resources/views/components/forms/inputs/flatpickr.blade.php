<input
    x-data="{
        initFlatpickr: function () {
            flatpickr('#{{ $id }}', {{ $jsonOptions() }});
        }
    }"
    x-init="initFlatpickr()"
    name="{{ $name }}"
    type="text"
    id="{{ $id }}"
    placeholder="{{ $placeholder }}"
    @if($value)value="{{ $value }}"@endif
    {{ $attributes }}
/>
