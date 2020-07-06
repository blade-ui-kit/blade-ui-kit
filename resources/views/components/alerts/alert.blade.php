@if ($exists())
    <div role="alert" {{ $attributes }}>
        @if ($slot->isEmpty())
            {{ $message() }}
        @else
            {{ $slot }}
        @endif
    </div>
@endif
