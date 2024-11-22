<label for="{{ $for }}" {{ $attributes }}>
    {{ $slot->isNotEmpty() ? $slot : $fallback }}
</label>
