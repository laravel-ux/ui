@blaze
@props(['showCloseButton' => false])
<div
    data-slot="dialog-footer"
    {{ $attributes->tailwindMerge('-mx-4 -mb-4 flex flex-col-reverse gap-2 rounded-b-xl border-t bg-muted/50 p-4 sm:flex-row sm:justify-end') }}
>
    {{ $slot }}
    @if ($showCloseButton)
        <x-ux::dialog.close variant="outline">@lang('Close')</x-ux::dialog.close>
    @endif
</div>
