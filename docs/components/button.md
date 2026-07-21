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

## Size

Use the `size` prop to change the size of the button.

```blade preview
<div class="flex flex-col items-start gap-8 sm:flex-row">
    <div class="flex items-start gap-2">
        <x-ux::button size="xs" variant="outline">
            Extra Small
        </x-ux::button>
        <x-ux::button size="icon-xs" aria-label="Submit" variant="outline">
            <x-ux::icon name="arrow-up-right" />
        </x-ux::button>
    </div>
    <div class="flex items-start gap-2">
        <x-ux::button size="sm" variant="outline">
            Small
        </x-ux::button>
        <x-ux::button size="icon-sm" aria-label="Submit" variant="outline">
            <x-ux::icon name="arrow-up-right" />
        </x-ux::button>
    </div>
    <div class="flex items-start gap-2">
        <x-ux::button variant="outline">Default</x-ux::button>
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

## Default

```blade preview
<x-ux::button>Button</x-ux::button>
```

## Outline

```blade preview
<x-ux::button variant="outline">Outline</x-ux::button>
```

## Secondary

```blade preview
<x-ux::button variant="secondary">Secondary</x-ux::button>
```

## Ghost

```blade preview
<x-ux::button variant="ghost">Ghost</x-ux::button>
```

## Destructive

```blade preview
<x-ux::button variant="destructive">Destructive</x-ux::button>
```

## Link

```blade preview
<x-ux::button variant="link">Link</x-ux::button>
```

## Icon

```blade preview
<x-ux::button variant="outline" size="icon">
    <x-ux::icon name="circle-fading-arrow-up" />
</x-ux::button>
```

## With Icon

Remember to add the `data-icon="inline-start"` or `data-icon="inline-end"` attribute to the icon for the correct spacing.

```blade preview
<div class="flex gap-2">
    <x-ux::button variant="outline">
        <x-ux::icon name="git-branch" data-icon="inline-start" />
        New Branch
    </x-ux::button>
    <x-ux::button variant="outline">
        Fork
        <x-ux::icon name="git-fork" data-icon="inline-end" />
    </x-ux::button>
</div>
```

## Rounded

Use the `rounded-full` class to make the button rounded.

```blade preview
<div class="flex gap-2">
    <x-ux::button class="rounded-full">Get Started</x-ux::button>
    <x-ux::button variant="outline" size="icon" class="rounded-full">
        <x-ux::icon name="arrow-up" />
    </x-ux::button>
</div>
```

## Spinner

Render a `x-ux::spinner` component inside the button to show a loading state. Remember to add the `data-icon="inline-start"` or `data-icon="inline-end"` attribute to the spinner for the correct spacing.

```blade preview
<div class="flex gap-2">
    <x-ux::button variant="outline" disabled>
        <x-ux::spinner data-icon="inline-start" />
        Generating
    </x-ux::button>
    <x-ux::button variant="secondary" disabled>
        Downloading
        <x-ux::spinner data-icon="inline-start" />
    </x-ux::button>
</div>
```

## Button Group

To create a button group, use the `x-ux::button-group` component. See the Button Group documentation for more details.

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
            <x-ux::dropdown-menu.content align="end" class="w-40">
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
                        <x-ux::icon name="list-filter" />
                        Add to List
                    </x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.sub>
                        <x-ux::dropdown-menu.sub.trigger>
                            <x-ux::icon name="tag" />
                            Label As...
                        </x-ux::dropdown-menu.sub.trigger>
                        <x-ux::dropdown-menu.sub.content>
                            <x-ux::dropdown-menu.radio.group value="personal">
                                <x-ux::dropdown-menu.radio.item value="personal">Personal</x-ux::dropdown-menu.radio.item>
                                <x-ux::dropdown-menu.radio.item value="work">Work</x-ux::dropdown-menu.radio.item>
                                <x-ux::dropdown-menu.radio.item value="other">Other</x-ux::dropdown-menu.radio.item>
                            </x-ux::dropdown-menu.radio.group>
                        </x-ux::dropdown-menu.sub.content>
                    </x-ux::dropdown-menu.sub>
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

## As Link

Pass an `href` attribute to render a semantic link that looks like a button.

```blade preview
<x-ux::button href="#" variant="secondary" size="sm">
    Login
</x-ux::button>
```

## RTL

To enable RTL support, set the `dir="rtl"` attribute on a parent element.

```blade preview
<div class="flex flex-wrap items-center gap-2 md:flex-row" dir="rtl">
    <x-ux::button variant="outline">زر</x-ux::button>
    <x-ux::button variant="destructive">حذف</x-ux::button>
    <x-ux::button variant="outline">
        إرسال
        <x-ux::icon name="arrow-right" class="rtl:rotate-180" data-icon="inline-end" />
    </x-ux::button>
    <x-ux::button variant="outline" size="icon" aria-label="Add">
        <x-ux::icon name="plus" />
    </x-ux::button>
    <x-ux::button variant="secondary" disabled>
        <x-ux::spinner data-icon="inline-start" />
        جاري التحميل
    </x-ux::button>
</div>
```

## API Reference

| Prop      | Type                                                                                              | Default     |
|-----------|---------------------------------------------------------------------------------------------------|-------------|
| `variant` | `enum` [?"default" \| "outline" \| "ghost" \| "destructive" \| "secondary" \| "link"]     | `"default"` |
| `size`    | `enum` [?"default" \| "xs" \| "sm" \| "lg" \| "icon" \| "icon-xs" \| "icon-sm" \| "icon-lg"] | `"default"` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-button --force
```
