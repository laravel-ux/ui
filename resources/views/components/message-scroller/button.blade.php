@blaze
@props([
    'behavior' => 'smooth',
    'direction' => 'end',
])
<x-ux::button
    x-message-scroller-button
    data-slot="message-scroller-button"
    data-direction="{{ $direction }}"
    data-behavior="{{ $behavior }}"
    data-active="false"
    variant="outline"
    size="icon"
    type="button"
    tabindex="-1"
    inert
    aria-label="{{ $direction === 'start' ? 'Scroll to start' : 'Scroll to end' }}"
    {{ $attributes->tailwindMerge('absolute bottom-4 start-1/2 z-10 -translate-x-1/2 rounded-full bg-background shadow-md transition-opacity data-[active=false]:pointer-events-none data-[active=false]:opacity-0 rtl:translate-x-1/2') }}
>
    {{ $slot->isEmpty() ? null : $slot }}
    @if($slot->isEmpty())
        <x-ux::icon :name="$direction === 'start' ? 'arrow-up' : 'arrow-down'" />
    @endif
</x-ux::button>
