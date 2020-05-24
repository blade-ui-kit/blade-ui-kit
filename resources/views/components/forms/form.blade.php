<form method="{{ $method !== 'GET' ? 'POST' : 'GET' }}" action="{{ $action }}" {{ $attributes }}>
    @csrf
    @method($method)

    {{ $slot }}
</form>
