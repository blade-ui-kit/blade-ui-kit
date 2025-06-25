<div id="{{ $id }}" {{ $attributes->whereDoesntStartWith('wire:model') }}
     x-data
     x-init="
         (function initQuill(options, initialValue) {
                var quillInput = $el.getElementsByTagName('input')[0];
                var quill = new Quill($el.getElementsByTagName('div')[0], options);

                if(quillInput.value) {
                    quill.setContents(JSON.parse(quillInput.value).ops);
                }


                (function() {
                {{-- Ensure EventListener is added after the first setContents --}}
                {{-- Without this, an infinite loop occurs --}}
                 var inputEvent = new Event('input');
                 quill.on('text-change', function(delta, oldDelta, source) {
                     quillInput.value = JSON.stringify(quill.getContents());
                     quillInput.dispatchEvent(inputEvent);
                 });
             })();
         }
        )({{ $jsonOptions() }});
    "
 wire:ignore>
    <input type="hidden"
            name="{{ $name }}"
            value="{{ $slot }}"
            {{ $attributes->wire('model') }}
    />
    <div class="quill-container"></div>
</div>
