@if ($human)

<time datetime="{{ $date->format($format) }}">
    {{ $date->diffForHumans() }}
</time>

@else

<span title="{{ $date->diffForHumans() }}">
    {{ $date->format($format) }}
</span>

@endif
