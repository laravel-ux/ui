@blaze
@props(['showCloseButton' => true])
@teleport('body')
    <div
        x-cloak
        x-dialog-content
        x-direction-portal
        data-slot="dialog-content"
        role="dialog"
        aria-modal="true"
        tabindex="-1"
        {{ $attributes->tailwindMerge('fixed top-1/2 left-1/2 z-50 grid w-full max-w-[calc(100%-2rem)] -translate-x-1/2 -translate-y-1/2 gap-4 rounded-xl bg-popover p-4 text-sm text-popover-foreground ring-1 ring-foreground/10 duration-100 outline-none sm:max-w-sm data-open:animate-in data-open:fade-in-0 data-open:zoom-in-95 data-closed:animate-out data-closed:fade-out-0 data-closed:zoom-out-95') }}
    >
        {{ $slot }}
        @if($showCloseButton)
            <x-ux::button
                x-dialog-close
                data-slot="dialog-close"
                type="button"
                variant="ghost"
                size="icon-sm"
                class="absolute top-2 end-2"
            >
                <x-ux::icon name="x" />
                <span class="sr-only">@lang('Close')</span>
            </x-ux::button>
        @endif
    </div>
@endteleport
