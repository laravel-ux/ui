@blaze
@props(['asChild' => false])
@php
    $attributes = $attributes
        ->merge(['data-slot' => 'bubble-content'])
        ->tailwindMerge('w-fit max-w-full min-w-0 overflow-hidden wrap-break-word rounded-xl border border-transparent px-3 py-2 text-sm leading-relaxed [button]:text-start [button,a]:transition-colors [button,a]:outline-none [button,a]:focus-visible:border-ring [button,a]:focus-visible:ring-3 [button,a]:focus-visible:ring-ring/50 group-data-[align=end]/bubble:self-end');
@endphp
@if($asChild)
    <x-ux::as-child {{ $attributes }}>{{ $slot }}</x-ux::as-child>
@else
    <div {{ $attributes }}>{{ $slot }}</div>
@endif
