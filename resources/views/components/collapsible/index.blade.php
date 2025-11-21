@props(['open' => false])
<div
    x-data
    x-collapsible="@js($open)"
    data-slot="collapsible"
    {{ $attributes }}
>
    {{ $slot }}
</div>
