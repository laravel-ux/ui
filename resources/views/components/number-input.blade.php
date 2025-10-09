<div
    class="{{ TailwindMerge::merge(
        'flex w-full flex-col items-start gap-0.5',
        $attributes->get('class'),
    ) }}"
>
    <div class="flex h-9 w-full items-center">
        <button
            tabindex="-1"
            x-on:click="$refs.input.value = Number($refs.input.value) - Number($refs.input.step || 1)"
            class="bg-background hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 inline-flex size-9 shrink-0 cursor-pointer items-center justify-center rounded-l-md border border-r-0 shadow-xs disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4"
        >
            <x-ux::icon name="minus" />
        </button>
        <input
            x-ref="input"
            type="text"
            data-slot="number-input"
            tabindex="0"
            spellcheck="false"
            autocorrect="off"
            autocomplete="off"
            inputmode="numeric"
            x-on:blur="$el.value = $el.value === '' ? '' : Math.min(Math.max(Number($el.value), Number($el.min || -Infinity)), Number($el.max || Infinity))"
            x-on:input="$event.target.value = $event.target.value.replace(/(?!^-)\D/g, '')"
            class="border-input placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 flex h-full w-full min-w-0 border bg-transparent px-3 py-1 text-center text-base tabular-nums transition-[color,box-shadow] ease-out outline-none data-disabled:pointer-events-none data-disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive"
            {{ $attributes->except(['class']) }}
        >
        <button
            tabindex="-1"
            x-on:click="$refs.input.value = Number($refs.input.value) + Number($refs.input.step || 1)"
            class="bg-background hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 inline-flex size-9 shrink-0 cursor-pointer items-center justify-center rounded-r-md border border-l-0 shadow-xs disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4"
        >
            <x-ux::icon name="plus" />
        </button>
    </div>
</div>
