@if ($human)

<time datetime="{{ $date->format($format) }}" {{ $attributes }}>
    {{ $date->diffForHumans() }}
</time>

@elseif ($local !== null)

<span
    x-data="{
        element: this.$root,
        timestamp: {{ $date->timestamp }}
    }"
    x-init="
        const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        const date = moment.unix(this.timestamp).tz(timeZone);

        this.element.innerHTML = date.format('{{ $local !== true ? $local : 'YYYY-MM-DD HH:mm:ss (z)' }}');
    "
    title="{{ $date->diffForHumans() }}"
    {{ $attributes }}
>
    {{ $date->format('Y-m-d H:i:s') }}
</span>

@else

<span title="{{ $date->diffForHumans() }}" {{ $attributes }}>
    {{ $date->format($format) }}
</span>

@endif
