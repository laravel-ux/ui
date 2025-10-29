# Collapsible

An interactive component which expands/collapses a panel.

```blade preview
<x-ux::collapsible class="flex w-[350px] flex-col gap-2">
    <div class="flex items-center justify-between gap-4 px-4">
        <h4 class="text-sm font-semibold">
            @peduarte starred 3 repositories
        </h4>
        <x-ux::collapsible.trigger as-child>
            <x-ux::button variant="ghost" size="icon" class="size-8">
                <x-ux::icon name="chevrons-up-down" />
            </x-ux::button>
        </x-ux::collapsible.trigger>
    </div>
    <div class="rounded-md border px-4 py-2 font-mono text-sm">
        @radix-ui/primitives
    </div>
    <x-ux::collapsible.content class="flex flex-col gap-2">
        <div class="rounded-md border px-4 py-2 font-mono text-sm">
            @radix-ui/colors
        </div>
        <div class="rounded-md border px-4 py-2 font-mono text-sm">
            @stitches/react
        </div>
    </x-ux::collapsible.content>
</x-ux::collapsible>
```

## Usage

```blade
<x-ux::collapsible>
    <x-ux::collapsible.trigger>
        Can I use this in my project?
    </x-ux::collapsible.trigger>
    <x-ux::collapsible.content>
        Yes. Free to use for personal and commercial projects. No attribution required.
    </x-ux::collapsible.content>
</x-ux::collapsible>
```

## API Reference

### Root

Contains all the parts of a collapsible.

| Prop                                                    | Type      | Default |
|---------------------------------------------------------|-----------|---------|
| `open` [?The controlled open state of the collapsible.] | `boolean` | `false` |

### Trigger

The button that toggles the collapsible.

| Prop      | Type                                                                                                              | Default |
|-----------|-------------------------------------------------------------------------------------------------------------------|---------|
| `asChild` | `boolean` [?Change the default rendered element for the one passed as a child, merging their props and behavior.] | `false` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-collapsible --force
```
