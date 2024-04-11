var marker = new google.maps.Marker({
    position: {{ $googlePosition() }},
    map: map,
    @foreach($attributes->getIterator()->getArrayCopy() as $attribute => $value)
        {{ json_encode($attribute) }}: {{ is_bool($value) && $value ? 'true' : (is_string($value) ? "\"$value\"" : $value) }},
    @endforeach
})
