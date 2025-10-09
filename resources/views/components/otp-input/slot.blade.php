@props(['index'])
<input
    {{ $attributes->tailwindMerge('text-center data-[active=true]:border-ring data-[active=true]:ring-ring/50 data-[active=true]:aria-invalid:ring-destructive/20 dark:data-[active=true]:aria-invalid:ring-destructive/40 aria-invalid:border-destructive data-[active=true]:aria-invalid:border-destructive dark:bg-input/30 border-input relative flex h-9 w-9 items-center justify-center border-y border-r text-sm shadow-xs transition-all outline-none first:rounded-l-md first:border-l last:rounded-r-md data-[active=true]:z-10 data-[active=true]:ring-[3px]') }}
    type="text"
    maxlength="1"
    autocomplete="off"
    data-slot="otp-input-slot"
    x-ref="{{ $index }}"
    x-on:focus="__OtpInputActive = @js($index)"
    x-on:blur="__OtpInputActive = null"
    x-bind:tabindex="__OtpInputActive === @js($index) ? 0 : -1"
    x-bind:data-active="__OtpInputActive === @js($index)"
    x-on:paste="(e) => { e.clipboardData.getData('text/plain').trim().split('').filter(item => __OtpInputPattern.test(item)).splice(0, __OtpInputLength).forEach((value, index) => { $refs[index].value = value; $refs[index].blur(); __OtpInputValues[index] = value; }); __OtpInputUpdate(); }"
    x-on:input.change="() => { if ($el.value && $el.value.match(__OtpInputPattern)) { __OtpInputValues[__OtpInputActive] = $el.value; __OtpInputUpdate(); if ($refs[__OtpInputActive + 1]) { $refs[__OtpInputActive + 1].focus() } else { $refs[__OtpInputActive].blur(); } } else { $refs[__OtpInputActive].value = ''; } }"
    x-on:keydown.backspace="() => { if (! $el.value) { delete __OtpInputValues[__OtpInputActive]; __OtpInputUpdate(); if ($refs[__OtpInputActive - 1]) { $refs[__OtpInputActive - 1].focus(); } else { $refs[__OtpInputActive].blur(); } } }"
/>
