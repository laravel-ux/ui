@props(['orientation' => 'vertical'])
<div
    role="group"
    data-slot="field"
    {{
        $attributes
            ->merge(['data-orientation' => $orientation])
            ->tailwindMerge(
                'group/field flex w-full gap-3 data-[invalid=true]:text-destructive',
                match ($orientation) {
                    'horizontal' => [
                        "flex-row items-center",
                        "[&>[data-slot=field-label]]:flex-auto",
                        "has-[>[data-slot=field-content]]:items-start has-[>[data-slot=field-content]]:[&>[role=checkbox],[role=radio]]:mt-px",
                    ],
                    'responsive' => [
                        "flex-col [&>*]:w-full [&>.sr-only]:w-auto @md/field-group:flex-row @md/field-group:items-center @md/field-group:[&>*]:w-auto",
                        "@md/field-group:[&>[data-slot=field-label]]:flex-auto",
                        "@md/field-group:has-[>[data-slot=field-content]]:items-start @md/field-group:has-[>[data-slot=field-content]]:[&>[role=checkbox],[role=radio]]:mt-px",
                    ],
                    default => 'flex-col [&>*]:w-full [&_*[data-slot=select-trigger]]:w-full [&>.sr-only]:w-auto',
                },
            )
    }}
>
    {{ $slot }}
</div>
