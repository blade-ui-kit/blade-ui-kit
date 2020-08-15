<form method="POST" action="{{ $action }}">
    @csrf

    <button type="submit" {{ $attributes }}>
        {{ $slot->isEmpty() ? __('Logout') : $slot }}
    </button>
</form>
