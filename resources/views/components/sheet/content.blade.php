@props(['side' => 'right'])
@teleport('body')
    <div
        x-cloak
        x-show="show"
        x-bind:data-state="show ? 'open' : 'closed'"
        role="menu"
        tabindex="-1"
        data-slot="sheet-content"
        {{ $attributes->tailwindMerge(
            'bg-background data-[state=open]:animate-in data-[state=closed]:animate-out fixed z-50 flex flex-col gap-4 shadow-lg transition ease-in-out data-[state=closed]:duration-300 data-[state=open]:duration-500',
            match ($side) {
                'left' => 'data-[state=closed]:slide-out-to-left data-[state=open]:slide-in-from-left inset-y-0 left-0 h-full w-3/4 border-r sm:max-w-sm',
                'top' => 'data-[state=closed]:slide-out-to-top data-[state=open]:slide-in-from-top inset-x-0 top-0 h-auto border-b',
                'bottom' => 'data-[state=closed]:slide-out-to-bottom data-[state=open]:slide-in-from-bottom inset-x-0 bottom-0 h-auto border-t',
                default => 'data-[state=closed]:slide-out-to-right data-[state=open]:slide-in-from-right inset-y-0 right-0 h-full w-3/4 border-l sm:max-w-sm',
            },
        ) }}
    >
        {{ $slot }}
        <button
            class="ring-offset-background focus:ring-ring data-[state=open]:bg-secondary absolute top-4 right-4 rounded-xs opacity-70 transition-opacity hover:opacity-100 focus:ring-2 focus:ring-offset-2 focus:outline-hidden disabled:pointer-events-none"
            x-on:click="show = false"
        >
            <x-ux::icon name="x" class="size-4" />
        </button>
    </div>
@endteleport
