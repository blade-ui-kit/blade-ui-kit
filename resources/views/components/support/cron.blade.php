@if ($human)

<span title="{{ $schedule }}" {{ $attributes }}>
    {{ $translate }}
</span>

@else

<span title="{{ $translate }}" {{ $attributes }}>
    {{ $schedule }}
</span>

@endif
