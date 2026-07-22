@blaze
<input
    {{
        $attributes
            ->merge(['data-slot' => 'input'])
            ->tailwindMerge([
                "dark:bg-input/30 border-input h-8 w-full min-w-0 rounded-lg border bg-transparent px-2.5 py-1 text-base transition-colors outline-none file:inline-flex file:h-6 file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground disabled:pointer-events-none disabled:cursor-not-allowed disabled:bg-input/50 disabled:opacity-50 dark:disabled:bg-input/80 md:text-sm",
                "focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-3",
                "aria-invalid:border-destructive aria-invalid:ring-destructive/20 aria-invalid:ring-3 dark:aria-invalid:border-destructive/50 dark:aria-invalid:ring-destructive/40",
            ])
    }}
/>
