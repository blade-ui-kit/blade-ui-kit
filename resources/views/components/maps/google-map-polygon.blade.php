@props(['position', 'radius', 'colour'])
var marker = new google.maps.Polygon({
    paths: {{ $googlePath() }},
    map: map,
    strokeColor: '{{ $colour }}',
    strokeOpacity: 1,
    strokeWeight: 1,
    fillColor: '{{ $colour }}',
    fillOpacity: 0.1,
    @foreach($attributes->getIterator()->getArrayCopy() as $attribute => $value)
        {{ json_encode($attribute) }}: {{ is_bool($value) && $value ? 'true' : (is_string($value) ? "\"$value\"" : $value) }},
    @endforeach
})
