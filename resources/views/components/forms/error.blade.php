@error($field)
    <div {{ $attributes }}>
        {{ $slot->isEmpty() ? $message : $slot }}
    </div>
@enderror
