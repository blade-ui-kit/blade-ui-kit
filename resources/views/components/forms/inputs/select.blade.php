<select
    name="{{ $name }}"
    id="{{ $id }}"
    {{ $attributes }}
>
    @if($placeholder)<option value="" hidden>{{ $placeholder }}</option>@endif
    @foreach($options as $value => $label)
        <option
            value="{{ $value }}"
            @if($value === $selected) selected @endif
        >{{ $label }}</option>
    @endforeach
</select>
