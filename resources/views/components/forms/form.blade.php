<form method="{{ $method !== 'GET' ? 'POST' : 'GET' }}" action="{{ $action?: Request::url() }}" {!! $hasFiles ? 'enctype="multipart/form-data"' : '' !!} {{ $attributes }}>
    @csrf
    @method($method)

    {{ $slot }}
</form>
