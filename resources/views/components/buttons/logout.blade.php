<form method="POST" action="{{ $action }}">
    @csrf

    <button type="submit" {{ $attributes }}>
        {{ $slot->isEmpty() ? __('Log out') : $slot }}
    </button>
</form>
