@if (session($type))
    <div role="alert" {{ $attributes }}>
        @if ($slot->isEmpty())
            {{ $flash }}
        @else
            {{ $slot }}
        @endif
    </div>
@endif
