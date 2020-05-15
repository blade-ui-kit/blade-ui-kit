@if ($human)

<time {!! $attributes->merge(['datetime' => $date->format($format)]) !!}>
    {{ $date->diffForHumans() }}
</time>

@else

<span {!! $attributes->merge(['title' => $date->diffForHumans()]) !!}>
    {{ $date->format($format) }}
</span>

@endif
