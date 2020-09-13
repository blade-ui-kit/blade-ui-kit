<form method="POST" action="{{ $action?: Request::url() }}">
    @csrf
    @method($method)

    <button type="submit" {{ $attributes }}>
        {{ $slot }}
    </button>
</form>
