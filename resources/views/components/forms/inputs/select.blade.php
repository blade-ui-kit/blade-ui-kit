<select
    name="{{ $name }}"
    id="{{ $id }}"
    {{ $attributes }}
>
@if(!$slot->isEmpty())
    {{ $slot }}
@else
    @if($placeholder)
        <option value="" hidden>{{ $placeholder }}</option>
    @endif
    @foreach($options as $value => $label)
        <option
            value="{{ $value }}"
            {!! $isSelected($value) ? 'selected' : '' !!}
        >{{ $label }}</option>
    @endforeach
@endif
</select>
