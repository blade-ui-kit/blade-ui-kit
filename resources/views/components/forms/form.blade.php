<form method="{{ $method }}" action="{{ $action }}" {{ $attributes }}>
    @csrf
    @method($method)

    {{ $slot }}
</form>
