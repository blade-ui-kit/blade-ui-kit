<div wire:ignore>
    <input
        x-data="{
            picker: null,
        }"
        x-init="$nextTick(() => { 
            if (picker) return;
                
            picker = flatpickr($root, {{ $jsonOptions() }});
        })"
        name="{{ $name }}"
        type="text"
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        @if($value) value="{{ $value }}" @endif
        {{ $attributes }}
    />
</div>
