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

## Composition

```text
x-ux::kbd

x-ux::kbd.group
├── x-ux::kbd
└── x-ux::kbd
```

## Examples

### Group

Use `x-ux::kbd.group` to group keyboard keys together.

```blade preview
<div class="flex flex-col items-center gap-4">
    <div class="text-muted-foreground text-sm">
        Use
        <x-ux::kbd.group>
            <x-ux::kbd>Ctrl</x-ux::kbd>
            <span>+</span>
            <x-ux::kbd>K</x-ux::kbd>
        </x-ux::kbd.group>
        to open the command palette
    </div>
</div>
```

### Button

Use `x-ux::kbd` inside `x-ux::button` to display a keyboard shortcut.

```blade preview
<div class="flex flex-wrap items-center gap-4">
    <x-ux::button variant="outline" size="sm" class="pe-2">
        Accept <x-ux::kbd>⏎</x-ux::kbd>
    </x-ux::button>
    <x-ux::button variant="outline" size="sm" class="pe-2">
        Cancel <x-ux::kbd>Esc</x-ux::kbd>
    </x-ux::button>
</div>
```

### Tooltip

Use `x-ux::kbd` inside `x-ux::tooltip` to show a shortcut alongside an action.

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

Use `x-ux::kbd` inside `x-ux::input-group.addon` to display a shortcut in an input.

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

## RTL

```blade preview
<div class="flex flex-col items-center gap-4" dir="rtl">
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

## Publishing

```shell
php artisan vendor:publish --tag=ux-kbd --force
```
