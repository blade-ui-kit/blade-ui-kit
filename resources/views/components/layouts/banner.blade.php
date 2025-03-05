<div x-data="{ dismiss: false }"
     x-show="dismiss === false && sessionStorage.getItem('{{ $sessionStorageName }}') !== '1'"
    {{ $attributes }}>
  {{ $slot }}
  <div @if($triggerClass)class="{{ $triggerClass }}" @endif
       @click="dismiss = true; sessionStorage.setItem('{{ $sessionStorageName }}', '1')"
       aria-label="Dismiss">
    {{ $trigger }}
  </div>
</div>
