<div
    x-data="
{
    initLeaflet: function () {
        var map = L.map('{{ $id }}', {{ json_encode($options()) }} );

        @switch($basemap)
            @case('osm')
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
                @break
            @case('hot')
                L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png').addTo(map);
                @break
            @case('terrain')
                L.tileLayer('//{s}.tile.stamen.com/terrain/{z}/{x}/{y}.png').addTo(map);
                @break
            @case('watercolor')
                L.tileLayer('//{s}.tile.stamen.com/watercolor/{z}/{x}/{y}.png').addTo(map);
                @break
            @case('toner-light')
                L.tileLayer('//{s}.tile.stamen.com/toner-lite/{z}/{x}/{y}.png').addTo(map);
                @break
            @default
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
        @endswitch

        @foreach ($markers as $marker)
            L.marker({{ json_encode(array_reverse($marker)) }}).addTo(map);
        @endforeach
    }
}"
    x-init="initLeaflet()"
    id="{{ $id }}"
    {{ $attributes }}
></div>
