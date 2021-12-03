<div x-data="{ open: false }" @click.outside="open = false" {{ $attributes }}>
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open">
        {{ $slot }}
    </div>
</div>
