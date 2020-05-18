@if (session($type))
    <div role="alert" {{ $attributes }}>
        {{ $message }}
    </div>
@endif
