<div
    x-data="
{
    initMapbox: function () {
        mapboxgl.accessToken = '{{ config('services.mapbox.public_token') }}';
        var map = new mapboxgl.Map({{ json_encode($options()) }});

        @foreach ($markers as $marker)
            new mapboxgl.Marker()
                .setLngLat({{ json_encode($marker) }})
                    .addTo(map);
        @endforeach
    }
}"
    x-init="initMapbox()"
    id="{{ $id }}"
    {{ $attributes }}
></div>
