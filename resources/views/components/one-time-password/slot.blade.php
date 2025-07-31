@props(['index'])
<input
    {{ $attributes->tailwindMerge('text-center data-[active=true]:border-ring data-[active=true]:ring-ring/50 data-[active=true]:aria-invalid:ring-destructive/20 dark:data-[active=true]:aria-invalid:ring-destructive/40 aria-invalid:border-destructive data-[active=true]:aria-invalid:border-destructive dark:bg-input/30 border-input relative flex h-9 w-9 items-center justify-center border-y border-r text-sm shadow-xs transition-all outline-none first:rounded-l-md first:border-l last:rounded-r-md data-[active=true]:z-10 data-[active=true]:ring-[3px]') }}
    type="text"
    maxlength="1"
    autocomplete="off"
    data-slot="one-time-password-slot"
    x-ref="{{ $index }}"
    x-on:focus="active = @js($index)"
    x-on:blur="active = null"
    x-bind:tabindex="active === @js($index) ? 0 : -1"
    x-bind:data-active="active === @js($index)"
    x-on:paste="(e) => { e.clipboardData.getData('text/plain').trim().split('').filter(item => pattern.test(item)).splice(0, length).forEach((value, index) => { $refs[index].value = value; $refs[index].blur(); values[index] = value; }); update(); }"
    x-on:input.change="() => { if ($el.value && $el.value.match(pattern)) { values[active] = $el.value; update(); if ($refs[active + 1]) { $refs[active + 1].focus() } else { $refs[active].blur(); } } else { $refs[active].value = ''; } }"
    x-on:keydown.backspace="() => { if (! $el.value) { delete values[active]; update(); if ($refs[active - 1]) { $refs[active - 1].focus(); } else { $refs[active].blur(); } } }"
/>
