@if (session($type))
    <div role="alert" {{ $attributes }}>
        {{ session()->pull($type) }}
    </div>
@endif
