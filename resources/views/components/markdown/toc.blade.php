@php($previousLevel = 2)

<ul {{ $attributes }}>
    <li>
        @foreach ($items($slot) as $item)
            @if (! $loop->first)
                @if ($item['level'] > $previousLevel)
                    <ul>
                        <li>
                @endif

                @if ($item['level'] < $previousLevel)
                        </li>
                    </ul>
                @endif

                @if ($item['level'] <= $previousLevel)
                    </li>
                    <li>
                @endif
            @endif

            <a href="{{ $url }}#{{ $item['anchor'] }}">
                {{ $item['title'] }}
            </a>

            @if ($loop->last && $item['level'] === 3)
                    </li>
                </ul>
            @endif

            @php($previousLevel = $item['level'])
        @endforeach
    </li>
</ul>
