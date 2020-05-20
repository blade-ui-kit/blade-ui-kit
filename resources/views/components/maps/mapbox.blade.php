<div id="{{ $id }}" {{ $attributes }}></div>
<script>
    window.onload = function () {
        mapboxgl.accessToken = '{{ config('services.mapbox.public_token') }}';
        var map = new mapboxgl.Map(@json($options()));

        @foreach($markers as $marker)
            new mapboxgl.Marker()
                .setLngLat(@json($marker))
                .addTo(map);
        @endforeach
    }
</script>
