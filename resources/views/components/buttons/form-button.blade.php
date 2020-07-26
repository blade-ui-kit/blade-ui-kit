<form method="POST" action="{{ $action }}">
    @csrf
    @method($method)

    <button type="submit" {{ $attributes }}>
        {{ $slot }}
    </button>
</form>
