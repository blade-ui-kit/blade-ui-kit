<div
    x-data
    x-init="
        FilePond.setOptions(JSON.parse('{{ $jsonOptions() }}', function (key, value) {
            if (value && (typeof value === 'string') && (value.indexOf('function') === 0 || value.indexOf('(') === 0)) {
                return new Function('return ' + value)();
            }
            return value;
        }));
        FilePond.create( $refs.filepond );
    "
>
    <input type="file" x-ref="filepond">
</div>