@if ($human)

<time datetime="{{ $date->format($format) }}" {{ $attributes }}>
    {{ $date->diffForHumans() }}
</time>

@else

<span title="{{ $date->diffForHumans() }}" {{ $attributes }}>
    {{ $date->format($format) }}
</span>

@endif
