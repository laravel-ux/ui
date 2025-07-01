@php
    $attributes = $attributes
        ->tailwindMerge('text-muted-foreground col-start-2 grid justify-items-start gap-1 text-sm [&_p]:leading-relaxed')
        ->merge(['data-slot' => 'alert-description']);
@endphp
<div {{ $attributes }}>
    {{ $slot }}
</div>
