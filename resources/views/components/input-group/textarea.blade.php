@blaze
<x-ux::textarea
    {{
        $attributes
            ->merge(['data-slot' => 'input-group-control'])
            ->tailwindMerge('flex-1 resize-none rounded-none border-0 bg-transparent py-2 shadow-none ring-0 focus-visible:ring-0 disabled:bg-transparent aria-invalid:ring-0 dark:bg-transparent dark:disabled:bg-transparent')
    }}
/>
