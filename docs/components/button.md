# Button

Displays a button or a component that looks like a button.

```blade preview
<div class="flex flex-wrap items-center gap-2 md:flex-row">
    <x-ux::button variant="outline">Button</x-ux::button>
    <x-ux::button variant="outline" size="icon" aria-label="Submit">
        <x-ux::icon name="arrow-up" />
    </x-ux::button>
</div>
```

## Usage

```blade
<x-ux::button variant="outline">Button</x-ux::button>
```

## Examples

### Size

```blade preview
<div class="flex flex-col items-start gap-8 sm:flex-row">
    <div class="flex items-start gap-2">
        <x-ux::button size="sm" variant="outline">
            Small
        </x-ux::button>
        <x-ux::button size="icon-sm" aria-label="Submit" variant="outline">
            <x-ux::icon name="arrow-up-right" />
        </x-ux::button>
    </div>
    <div class="flex items-start gap-2">
        <x-ux::button variant="outline">
            Default
        </x-ux::button>
        <x-ux::button size="icon" aria-label="Submit" variant="outline">
            <x-ux::icon name="arrow-up-right" />
        </x-ux::button>
    </div>
    <div class="flex items-start gap-2">
        <x-ux::button variant="outline" size="lg">
            Large
        </x-ux::button>
        <x-ux::button size="icon-lg" aria-label="Submit" variant="outline">
            <x-ux::icon name="arrow-up-right" />
        </x-ux::button>
    </div>
</div>
```

### Default

```blade preview
<x-ux::button>Button</x-ux::button>
```

### Outline

```blade preview
<x-ux::button variant="outline">Outline</x-ux::button>
```

### Secondary

```blade preview
<x-ux::button variant="secondary">Secondary</x-ux::button>
```

### Ghost

```blade preview
<x-ux::button variant="ghost">Ghost</x-ux::button>
```

### Destructive

```blade preview
<x-ux::button variant="destructive">Destructive</x-ux::button>
```

### Link

```blade preview
<x-ux::button variant="link">Link</x-ux::button>
```

### As Link

Display an HTML `a` tag as a button bypassing the `href` prop.

```blade preview
<x-ux::button href="https://www.google.com/" target="_blank">
    Google
</x-ux::button>
```

### Icon

```blade preview
<x-ux::button variant="outline" size="icon">
    <x-ux::icon name="circle-fading-arrow-up" />
</x-ux::button>
```

### With Icon

The spacing between the icon and the text is automatically adjusted based on the size of the button.
You do not need any margin on the icon.

```blade preview
<x-ux::button variant="outline" size="sm">
    <x-ux::icon name="git-branch" />
    New Branch
</x-ux::button>
```

### Rounded

Use the `rounded-full` class to make the button rounded.

```blade preview
<x-ux::button variant="outline" size="icon" class="rounded-full">
    <x-ux::icon name="arrow-up" />
</x-ux::button>
```

### Spinner

```blade preview
<x-ux::button size="sm" variant="outline" disabled>
    <x-ux::spinner />
    Submit
</x-ux::button>
```

### Button Group

To create a button group, use the `<x-ux::button-group>` component.

```blade preview
<x-ux::button-group>
    <x-ux::button-group class="hidden sm:flex">
        <x-ux::button variant="outline" size="icon" aria-label="Go Back">
            <x-ux::icon name="arrow-left" />
        </x-ux::button>
    </x-ux::button-group>
    <x-ux::button-group>
        <x-ux::button variant="outline">Archive</x-ux::button>
        <x-ux::button variant="outline">Report</x-ux::button>
    </x-ux::button-group>
    <x-ux::button-group>
        <x-ux::button variant="outline">Snooze</x-ux::button>
        <x-ux::dropdown-menu>
            <x-ux::dropdown-menu.trigger as-child>
                <x-ux::button variant="outline" size="icon" aria-label="More Options">
                    <x-ux::icon name="ellipsis" />
                </x-ux::button>
            </x-ux::dropdown-menu.trigger>
            <x-ux::dropdown-menu.content align="end" className="w-52">
                <x-ux::dropdown-menu.group>
                    <x-ux::dropdown-menu.item>
                        <x-ux::icon name="mail-check" />
                        Mark as Read
                    </x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>
                        <x-ux::icon name="archive" />
                        Archive
                    </x-ux::dropdown-menu.item>
                </x-ux::dropdown-menu.group>
                <x-ux::dropdown-menu.separator />
                <x-ux::dropdown-menu.group>
                    <x-ux::dropdown-menu.item>
                        <x-ux::icon name="clock" />
                        Snooze
                    </x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>
                        <x-ux::icon name="calendar-plus" />
                        Add to Calendar
                    </x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>
                        <x-ux::icon name="list-filter-plus" />
                        Add to List
                    </x-ux::dropdown-menu.item>
                </x-ux::dropdown-menu.group>
                <x-ux::dropdown-menu.separator />
                <x-ux::dropdown-menu.group>
                    <x-ux::dropdown-menu.item variant="destructive">
                        <x-ux::icon name="trash-2" />
                        Trash
                    </x-ux::dropdown-menu.item>
                </x-ux::dropdown-menu.group>
            </x-ux::dropdown-menu.content>
        </x-ux::dropdown-menu>
    </x-ux::button-group>
</x-ux::button-group>
```

## API Reference

| Prop      | Type                                                                                  | Default     |
|-----------|---------------------------------------------------------------------------------------|-------------|
| `size`    | `enum` [?"default" \| "sm" \| "lg" \| "icon" \| "icon-sm" \| "icon-lg"]               | `"default"` |
| `variant` | `enum` [?"default" \| "secondary" \| "destructive" \| "outline" \| "ghost" \| "link"] | `"default"` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-button --force
```
