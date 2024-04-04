@php
$model = $attributes->whereStartsWith('wire:model');
$key = uniqid();
@endphp

<div {{ $attributes->whereDoesntStartWith('wire:model') }} wire:ignore>
    <input name="{{ $name }}" id="{{ $id }}" value="{{ old($name, $slot) }}" type="hidden">

    <trix-editor
        @if ($model->first())
            x-data
            x-on:trix-change="$dispatch('input', event.target.value)"
            x-ref="trix"
            wire:key="{{ $key }}"
            {{ $attributes->whereStartsWith('wire:model') }}
        @endif
        input="{{ $id }}"
        class="{{ $styling }}"
    ></trix-editor>
</div>
