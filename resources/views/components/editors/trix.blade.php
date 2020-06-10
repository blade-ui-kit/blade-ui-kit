<div {{ $attributes }}>
    <input name="{{ $name }}" id="{{ $id }}" value="{{ old($name, $slot) }}" type="hidden">
    <trix-editor input="{{ $id }}" class="{{ $styling }}"></trix-editor>
</div>
