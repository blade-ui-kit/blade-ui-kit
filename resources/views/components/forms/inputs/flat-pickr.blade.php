<input
    x-data="{
        picker: null,
        initPicker() {
            if (this.picker) return;
            
            this.picker = flatpickr(this.$el, {{ $jsonOptions() }});
        }
    }"
    x-init="$nextTick(() => { initPicker() })"
    name="{{ $name }}"
    type="text"
    id="{{ $id }}"
    placeholder="{{ $placeholder }}"
    @if($value) value="{{ $value }}" @endif
    {{ $attributes }}
/>
