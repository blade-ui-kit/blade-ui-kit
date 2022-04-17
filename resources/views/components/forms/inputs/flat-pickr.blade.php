<input
    x-data="{picker:null}"
    x-on:mouseenter="picker=picker||flatpickr($el, {{ $jsonOptions() }}),picker.open()"
    name="{{ $name }}"
    type="text"
    id="{{ $id }}"
    placeholder="{{ $placeholder }}"
    @if($value)value="{{ $value }}"@endif
    {{ $attributes }}
/>
