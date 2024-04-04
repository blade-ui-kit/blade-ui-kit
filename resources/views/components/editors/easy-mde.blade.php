@php
$model = $attributes->whereStartsWith('wire:model')->first();
$isLive = filled($attributes->whereStartsWith('wire:model.live')->first()) ? 'true' : 'false';
@endphp

<div wire:ignore>
    <textarea
        x-data="{
            easyMDE: null
        }"
        x-init="
            this.easyMDE = new EasyMDE({ element: $root {{ $jsonOptions() }} });

            @if ($model)
                this.easyMDE.codemirror.on('change', () => {
                    $wire.$set('{{ $model }}', this.easyMDE.value(), {{ $isLive }})
                });
            @endif
        "
        name="{{ $name }}"
        id="{{ $id }}"
        {{ $attributes }}
    >{{ old($name, $slot) }}</textarea>
</div>
