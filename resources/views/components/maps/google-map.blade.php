<div
    style="height:-webkit-fill-available"
    x-data="{
        initGoogleMap: function () {
            var el = document.getElementById('{{ $id }}')
            var map = new google.maps.Map(el, {{ json_encode($options()) }});

            @foreach($googleMarkers() as $marker)
                var marker = new google.maps.Marker({position: {{ json_encode($marker) }}, map: map});
            @endforeach
        }
    }"
    x-init="() => initGoogleMap()"
    id="{{ $id }}"
    {{ $attributes }}
></div>
