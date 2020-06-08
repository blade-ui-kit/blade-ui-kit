<form method="POST" action="{{ $action }}">
    @csrf
    @method('POST')

    <button type="submit" {{ $attributes }}>
        {{ $slot->isEmpty() ? __('Sign Out') : $slot }}
    </button>
</form>
