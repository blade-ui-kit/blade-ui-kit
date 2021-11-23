<label for="{{ $for }}" {{ $attributes }}>
    {{ $slot->isEmpty() ? $fallback : $slot }}
</label>
