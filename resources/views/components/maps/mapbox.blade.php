<div
    x-init="
        mapboxgl.accessToken = '{{ config('services.mapbox.public_token') }}';
        var map = new mapboxgl.Map({{ json_encode($options()) }});

        @foreach ($markers as $marker)
            new mapboxgl.Marker()
                .setLngLat({{ json_encode($marker) }})
                    .addTo(map);
        @endforeach
    "
    id="{{ $id }}"
    {{ $attributes }}
></div>
