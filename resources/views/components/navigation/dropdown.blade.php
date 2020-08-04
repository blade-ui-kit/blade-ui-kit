<div x-data="{ open: false }" @click.away="open = false" {{ $attributes }}>
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open">
        {{ $slot }}
    </div>
</div>
