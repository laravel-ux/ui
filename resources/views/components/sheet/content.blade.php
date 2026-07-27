@blaze
@props([
    'side' => 'right',
    'showCloseButton' => true,
])
@teleport('body')
    <div
        x-cloak
        x-dialog-content
        x-direction-portal
        data-slot="sheet-content"
        data-side="{{ $side }}"
        role="dialog"
        aria-modal="true"
        tabindex="-1"
        {{ $attributes->tailwindMerge('fixed z-50 flex flex-col gap-4 bg-popover bg-clip-padding text-sm text-popover-foreground shadow-lg transition duration-200 ease-in-out outline-none data-open:animate-in data-open:fade-in-0 data-closed:animate-out data-closed:fade-out-0 data-[side=bottom]:inset-x-0 data-[side=bottom]:bottom-0 data-[side=bottom]:h-auto data-[side=bottom]:border-t data-[side=bottom]:data-open:slide-in-from-bottom-10 data-[side=bottom]:data-closed:slide-out-to-bottom-10 data-[side=left]:inset-y-0 data-[side=left]:left-0 data-[side=left]:h-full data-[side=left]:w-3/4 data-[side=left]:border-r data-[side=left]:data-open:slide-in-from-left-10 data-[side=left]:data-closed:slide-out-to-left-10 data-[side=right]:inset-y-0 data-[side=right]:right-0 data-[side=right]:h-full data-[side=right]:w-3/4 data-[side=right]:border-l data-[side=right]:data-open:slide-in-from-right-10 data-[side=right]:data-closed:slide-out-to-right-10 data-[side=top]:inset-x-0 data-[side=top]:top-0 data-[side=top]:h-auto data-[side=top]:border-b data-[side=top]:data-open:slide-in-from-top-10 data-[side=top]:data-closed:slide-out-to-top-10 data-[side=left]:sm:max-w-sm data-[side=right]:sm:max-w-sm') }}
    >
        {{ $slot }}
        @if($showCloseButton)
            <x-ux::sheet.close
                variant="ghost"
                size="icon-sm"
                class="absolute top-3 end-3"
            >
                <x-ux::icon name="x" class="size-4" aria-hidden="true" />
                <span class="sr-only">@lang('Close')</span>
            </x-ux::sheet.close>
        @endif
    </div>
@endteleport
