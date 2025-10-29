# Kbd

Used to display textual user input from keyboard.

```blade preview
<div class="flex flex-col items-center gap-4">
    <x-ux::kbd.group>
        <x-ux::kbd>⌘</x-ux::kbd>
        <x-ux::kbd>⇧</x-ux::kbd>
        <x-ux::kbd>⌥</x-ux::kbd>
        <x-ux::kbd>⌃</x-ux::kbd>
    </x-ux::kbd.group>
    <x-ux::kbd.group>
        <x-ux::kbd>Ctrl</x-ux::kbd>
        <span>+</span>
        <x-ux::kbd>B</x-ux::kbd>
    </x-ux::kbd.group>
</div>
```

## Usage

```blade
<x-ux::kbd>Ctrl</x-ux::kbd>
```

## Examples

### Group

Use the `<x-ux::kbd.group>` component to group keyboard keys together.

```blade preview
<div class="flex flex-col items-center gap-4">
    <div class="text-muted-foreground text-sm">
        Use
        <x-ux::kbd.group>
          <x-ux::kbd>Ctrl + B</x-ux::kbd>
          <x-ux::kbd>Ctrl + K</x-ux::kbd>
        </x-ux::kbd.group>
        to open the command palette
    </div>
</div>
```

### Button

Use the `<x-ux::kbd>` component inside a `<x-ux::button>` component to display a keyboard key inside a button.

```blade preview
<div class="flex flex-wrap items-center gap-4">
    <x-ux::button variant="outline" size="sm" class="pr-2">
        Accept <x-ux::kbd>⏎</x-ux::kbd>
    </x-ux::button>
    <x-ux::button variant="outline" size="sm" class="pr-2">
        Cancel <x-ux::kbd>Esc</x-ux::kbd>
    </x-ux::button>
</div>
```

### Tooltip

You can use the `<x-ux::kbd>` component inside a `<x-ux::tooltip>` component to display a tooltip with a keyboard key.

```blade preview
<div class="flex flex-wrap gap-4">
    <x-ux::button-group>
         <x-ux::tooltip>
            <x-ux::tooltip.trigger as-child>
                <x-ux::button size="sm" variant="outline">
                    Save
                </x-ux::button>
            </x-ux::tooltip.trigger>
            <x-ux::tooltip.content>
                <div class="flex items-center gap-2">
                    Save Changes <x-ux::kbd>S</x-ux::kbd>
                </div>
            </x-ux::tooltip.content>
        </x-ux::tooltip>
        <x-ux::tooltip>
            <x-ux::tooltip.trigger as-child>
                <x-ux::button size="sm" variant="outline">
                    Print
                </x-ux::button>
            </x-ux::tooltip.trigger>
            <x-ux::tooltip.content>
                <div class="flex items-center gap-2">
                    Print Document
                    <x-ux::kbd.group>
                        <x-ux::kbd>Ctrl</x-ux::kbd>
                        <x-ux::kbd>P</x-ux::kbd>
                    </x-ux::kbd.group>
                </div>
            </x-ux::tooltip.content>
        </x-ux::tooltip>
    </x-ux::button-group>
</div>
```

### Input Group

You can use the `<x-ux::kbd>` component inside a `<x-ux::input-group.addon>` component to display a keyboard key inside an input group.

```blade preview
<div class="flex w-full max-w-xs flex-col gap-6">
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Search..." />
        <x-ux::input-group.addon>
            <x-ux::icon name="search" />
        </x-ux::input-group.addon>
        <x-ux::input-group.addon align="inline-end">
            <x-ux::kbd>⌘</x-ux::kbd>
            <x-ux::kbd>K</x-ux::kbd>
        </x-ux::input-group.addon>
    </x-ux::input-group>
</div>
```

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-kbd --force
```

