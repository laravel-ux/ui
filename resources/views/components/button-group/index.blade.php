@blaze
@props([
    'orientation' => 'horizontal',
])
<div
    {{
        $attributes
            ->merge(['data-slot' => 'button-group', 'data-orientation' => $orientation])
            ->tailwindMerge(
                "flex w-fit items-stretch [&>*]:focus-visible:z-10 [&>*]:focus-visible:relative [&>[data-slot=select-trigger]:not([class*='w-'])]:w-fit [&>input]:flex-1 has-[select[aria-hidden=true]:last-child]:[&>[data-slot=select-trigger]:last-of-type]:rounded-r-md has-[>[data-slot=button-group]]:gap-2",
                match ($orientation) {
                    'vertical' => [
                        'flex-col',
                        '[&>*:not(:first-child)]:rounded-t-none',
                        '[&>*:not(:first-child)]:border-t-0',
                        '[&>*:not(:last-child)]:rounded-b-none',
                        '[&>[data-slot=tooltip]:not(:first-child)>[data-slot=tooltip-trigger]]:rounded-t-none',
                        '[&>[data-slot=tooltip]:not(:first-child)>[data-slot=tooltip-trigger]]:border-t-0',
                        '[&>[data-slot=tooltip]:not(:last-child)>[data-slot=tooltip-trigger]]:rounded-b-none',
                        '[&>[data-slot=popover]:not(:first-child)>[data-slot=popover-trigger]]:rounded-t-none',
                        '[&>[data-slot=popover]:not(:first-child)>[data-slot=popover-trigger]]:border-t-0',
                        '[&>[data-slot=popover]:not(:last-child)>[data-slot=popover-trigger]]:rounded-b-none',
                        '[&>[data-slot=dropdown-menu]:not(:first-child)>[data-slot=dropdown-menu-trigger]]:rounded-t-none',
                        '[&>[data-slot=dropdown-menu]:not(:first-child)>[data-slot=dropdown-menu-trigger]]:border-t-0',
                        '[&>[data-slot=dropdown-menu]:not(:last-child)>[data-slot=dropdown-menu-trigger]]:rounded-b-none',
                        '[&>[data-slot=select]:not(:first-child)>[data-slot=select-trigger]]:rounded-t-none',
                        '[&>[data-slot=select]:not(:first-child)>[data-slot=select-trigger]]:border-t-0',
                        '[&>[data-slot=select]:not(:last-child)>[data-slot=select-trigger]]:rounded-b-none',
                    ],
                    default => [
                        '[&>*:not(:first-child)]:rounded-l-none',
                        '[&>*:not(:first-child)]:border-l-0',
                        '[&>*:not(:last-child)]:rounded-r-none',
                        '[&>[data-slot=tooltip]:not(:first-child)>[data-slot=tooltip-trigger]]:rounded-l-none',
                        '[&>[data-slot=tooltip]:not(:first-child)>[data-slot=tooltip-trigger]]:border-l-0',
                        '[&>[data-slot=tooltip]:not(:last-child)>[data-slot=tooltip-trigger]]:rounded-r-none',
                        '[&>[data-slot=popover]:not(:first-child)>[data-slot=popover-trigger]]:rounded-l-none',
                        '[&>[data-slot=popover]:not(:first-child)>[data-slot=popover-trigger]]:border-l-0',
                        '[&>[data-slot=popover]:not(:last-child)>[data-slot=popover-trigger]]:rounded-r-none',
                        '[&>[data-slot=dropdown-menu]:not(:first-child)>[data-slot=dropdown-menu-trigger]]:rounded-l-none',
                        '[&>[data-slot=dropdown-menu]:not(:first-child)>[data-slot=dropdown-menu-trigger]]:border-l-0',
                        '[&>[data-slot=dropdown-menu]:not(:last-child)>[data-slot=dropdown-menu-trigger]]:rounded-r-none',
                        '[&>[data-slot=select]:not(:first-child)>[data-slot=select-trigger]]:rounded-l-none',
                        '[&>[data-slot=select]:not(:first-child)>[data-slot=select-trigger]]:border-l-0',
                        '[&>[data-slot=select]:not(:last-child)>[data-slot=select-trigger]]:rounded-r-none',
                    ],
                },
            )
    }}
>
    {{ $slot }}
</div>
