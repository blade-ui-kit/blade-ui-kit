<form method="{{ $method !== 'GET' ? 'POST' : 'GET' }}" action="{{ $action }}" {!! $hasFiles ? 'enctype="multipart/form-data"' : '' !!} {{ $attributes }}>
    @csrf
    @method($method)

    {{ $slot }}
</form>
