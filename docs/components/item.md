# Item

A versatile component that you can use to display any content.

```blade preview
<div class="flex w-full max-w-md flex-col gap-6">
    <x-ux::item variant="outline">
        <x-ux::item.content>
            <x-ux::item.title>Basic Item</x-ux::item.title>
            <x-ux::item.description>
                A simple item with title and description.
            </x-ux::item.description>
        </x-ux::item.content>
        <x-ux::item.actions>
            <x-ux::button variant="outline" size="sm">
                Action
            </x-ux::button>
        </x-ux::item.actions>
    </x-ux::item>
    <x-ux::item variant="outline" size="sm" as-child>
        <a href="#">
            <x-ux::item.media>
                <x-ux::icon name="badge-check" class="size-5" />
            </x-ux::item.media>
            <x-ux::item.content>
                <x-ux::item.title>Your profile has been verified.</x-ux::item.title>
            </x-ux::item.content>
            <x-ux::item.actions>
                <x-ux::icon name="chevron-right" class="size-4" />
            </x-ux::item.actions>
        </a>
    </x-ux::item>
</div>
```

## Usage

```blade
<x-ux::item>
    <x-ux::item.header>Item Header</x-ux::item.header>
    <x-ux::item.media />
    <x-ux::item.content>
        <x-ux::item.title>Item</x-ux::item.title>
        <x-ux::item.description>Item</x-ux::item.description>
    </x-ux::item.content>
    <x-ux::item.actions />
    <x-ux::item.footer>Item Footer</x-ux::item.footer>
</x-ux::item>
```

## Item vs Field

Use `<x-ux::field>` if you need to display a form input such as a checkbox, input, radio, or select.

If you only need to display content such as a title, description, and actions, use `<x-ux::item>`.

## Examples

### Variants

```blade preview
<div class="flex flex-col gap-6">
    <x-ux::item>
        <x-ux::item.content>
            <x-ux::item.title>Default Variant</x-ux::item.title>
            <x-ux::item.description>
                Standard styling with subtle background and borders.
            </x-ux::item.description>
        </x-ux::item.content>
        <x-ux::item.actions>
            <x-ux::button variant="outline" size="sm">
                Open
            </x-ux::button>
        </x-ux::item.actions>
    </x-ux::item>
    <x-ux::item variant="outline">
        <x-ux::item.content>
            <x-ux::item.title>Outline Variant</x-ux::item.title>
            <x-ux::item.description>
                Outlined style with clear borders and transparent background.
            </x-ux::item.description>
        </x-ux::item.content>
        <x-ux::item.actions>
            <x-ux::button variant="outline" size="sm">
                Open
            </x-ux::button>
        </x-ux::item.actions>
    </x-ux::item>
    <x-ux::item variant="muted">
        <x-ux::item.content>
            <x-ux::item.title>Muted Variant</x-ux::item.title>
            <x-ux::item.description>
                Subdued appearance with muted colors for secondary content.
            </x-ux::item.description>
        </x-ux::item.content>
        <x-ux::item.actions>
            <x-ux::button variant="outline" size="sm">
                Open
            </x-ux::button>
        </x-ux::item.actions>
    </x-ux::item>
</div>
```

### Size

The `<x-ux::item>` component has different sizes for different use cases.

```blade preview
<div class="flex w-full max-w-md flex-col gap-6">
    <x-ux::item variant="outline">
        <x-ux::item.content>
            <x-ux::item.title>Basic Item</x-ux::item.title>
            <x-ux::item.description>
                A simple item with title and description.
            </x-ux::item.description>
        </x-ux::item.content>
        <x-ux::item.actions>
            <x-ux::button variant="outline" size="sm">
                Action
            </x-ux::button>
        </x-ux::item.actions>
    </x-ux::item>
    <x-ux::item variant="outline" size="sm" asChild>
        <a href="#">
            <x-ux::item.media>
                <x-ux::icon name="badge-check" class="size-5" />
            </x-ux::item.media>
            <x-ux::item.content>
                <x-ux::item.title>Your profile has been verified.</x-ux::item.title>
            </x-ux::item.content>
            <x-ux::item.actions>
                <x-ux::icon name="chevron-right" class="size-4" />
            </x-ux::item.actions>
        </a>
    </x-ux::item>
</div>
```

### Icon

```blade preview
<div class="flex w-full max-w-lg flex-col gap-6">
    <x-ux::item variant="outline">
        <x-ux::item.media variant="icon">
            <x-ux::icon name="shield-alert" />
        </x-ux::item.media>
        <x-ux::item.content>
            <x-ux::item.title>Security Alert</x-ux::item.title>
            <x-ux::item.description>
                New login detected from unknown device.
            </x-ux::item.description>
        </x-ux::item.content>
        <x-ux::item.actions>
            <x-ux::button size="sm" variant="outline">
                Review
            </x-ux::button>
        </x-ux::item.actions>
    </x-ux::item>
</div>
```

### Avatar

```blade preview
<div class="flex w-full max-w-lg flex-col gap-6">
    <x-ux::item variant="outline">
        <x-ux::item.media>
            <x-ux::avatar class="size-10">
                <x-ux::avatar.image src="https://github.com/evilrabbit.png" />
                <x-ux::avatar.fallback>ER</x-ux::avatar.fallback>
            </x-ux::avatar>
        </x-ux::item.media>
        <x-ux::item.content>
            <x-ux::item.title>Evil Rabbit</x-ux::item.title>
            <x-ux::item.description>Last seen 5 months ago</x-ux::item.description>
        </x-ux::item.content>
        <x-ux::item.actions>
            <x-ux::button
                size="icon-sm"
                variant="outline"
                class="rounded-full"
                aria-label="Invite"
            >
                <x-ux::icon name="plus" />
            </x-ux::button>
        </x-ux::item.actions>
    </x-ux::item>
    <x-ux::item variant="outline">
        <x-ux::item.media>
            <div class="*:data-[slot=avatar]:ring-background flex -space-x-2 *:data-[slot=avatar]:ring-2 *:data-[slot=avatar]:grayscale">
                <x-ux::avatar class="hidden sm:flex">
                    <x-ux::avatar.image src="https://github.com/shadcn.png" alt="@shadcn" />
                    <x-ux::avatar.fallback>CN</x-ux::avatar.fallback>
                </x-ux::avatar>
                <x-ux::avatar class="hidden sm:flex">
                    <x-ux::avatar.image
                        src="https://github.com/maxleiter.png"
                        alt="@maxleiter"
                    />
                    <x-ux::avatar.fallback>LR</x-ux::avatar.fallback>
                </x-ux::avatar>
                <x-ux::avatar>
                    <x-ux::avatar.image
                        src="https://github.com/evilrabbit.png"
                        alt="@evilrabbit"
                    />
                    <x-ux::avatar.fallback>ER</x-ux::avatar.fallback>
                </x-ux::avatar>
            </div>
        </x-ux::item.media>
        <x-ux::item.content>
            <x-ux::item.title>No Team Members</x-ux::item.title>
            <x-ux::item.description>
                Invite your team to collaborate on this project.
            </x-ux::item.description>
        </x-ux::item.content>
        <x-ux::item.actions>
            <x-ux::button size="sm" variant="outline">
                Invite
            </x-ux::button>
        </x-ux::item.actions>
    </x-ux::item>
</div>
```

### Image

```blade preview
<div class="flex w-full max-w-md flex-col gap-6">
    <x-ux::item.group class="gap-4">
        <x-ux::item variant="outline" role="listitem" as-child>
            <a href="#">
                <x-ux::item.media variant="image">
                    <img
                        src="https://avatar.vercel.sh/Midnight City Lights"
                        alt="Midnight City Lights"
                        width="32"
                        height="32"
                        class="object-cover grayscale"
                    />
                </x-ux::item.media>
                <x-ux::item.content>
                    <x-ux::item.title class="line-clamp-1">
                        Midnight City Lights -
                        <span class="text-muted-foreground">
                            Electric Nights
                        </span>
                    </x-ux::item.title>
                    <x-ux::item.description>
                        Neon Dreams
                    </x-ux::item.description>
                </x-ux::item.content>
                <x-ux::item.content class="flex-none text-center">
                    <x-ux::item.description>
                        3:45
                    </x-ux::item.description>
                </x-ux::item.content>
            </a>
        </x-ux::item>
        <x-ux::item variant="outline" role="listitem" as-child>
            <a href="#">
                <x-ux::item.media variant="image">
                    <img
                        src="https://avatar.vercel.sh/Coffee Shop Conversations"
                        alt="Coffee Shop Conversations"
                        width="32"
                        height="32"
                        class="object-cover grayscale"
                    />
                </x-ux::item.media>
                <x-ux::item.content>
                    <x-ux::item.title class="line-clamp-1">
                        Coffee Shop Conversations -
                        <span class="text-muted-foreground">
                            Urban Stories
                        </span>
                    </x-ux::item.title>
                    <x-ux::item.description>
                        The Morning Brew
                    </x-ux::item.description>
                </x-ux::item.content>
                <x-ux::item.content class="flex-none text-center">
                    <x-ux::item.description>
                        4:05
                    </x-ux::item.description>
                </x-ux::item.content>
            </a>
        </x-ux::item>
        <x-ux::item variant="outline" role="listitem" as-child>
            <a href="#">
                <x-ux::item.media variant="image">
                    <img
                        src="https://avatar.vercel.sh/Digital Rain"
                        alt="Digital Rain"
                        width="32"
                        height="32"
                        class="object-cover grayscale"
                    />
                </x-ux::item.media>
                <x-ux::item.content>
                    <x-ux::item.title class="line-clamp-1">
                        Digital Rain -
                        <span class="text-muted-foreground">
                            Binary Beats
                        </span>
                    </x-ux::item.title>
                    <x-ux::item.description>
                        Cyber Symphony
                    </x-ux::item.description>
                </x-ux::item.content>
                <x-ux::item.content class="flex-none text-center">
                    <x-ux::item.description>
                        3:30
                    </x-ux::item.description>
                </x-ux::item.content>
            </a>
        </x-ux::item>
    </x-ux::item.group>
</div>
```

### Group

```blade preview
<div class="flex w-full max-w-md flex-col gap-6">
    <x-ux::item.group>
        <x-ux::item>
            <x-ux::item.media>
                <x-ux::avatar>
                    <x-ux::avatar.image src="https://github.com/shadcn.png" class="grayscale" />
                    <x-ux::avatar.fallback>S</x-ux::avatar.fallback>
                </x-ux::avatar>
            </x-ux::item.media>
            <x-ux::item.content class="gap-1">
                <x-ux::item.title>shadcn</x-ux::item.title>
                <x-ux::item.description>shadcn@vercel.com</x-ux::item.description>
            </x-ux::item.content>
            <x-ux::item.actions>
                <x-ux::button variant="ghost" size="icon" class="rounded-full">
                    <x-ux::icon name="plus" />
                </x-ux::button>
            </x-ux::item.actions>
        </x-ux::item>
        <x-ux::item.separator />
        <x-ux::item>
            <x-ux::item.media>
                <x-ux::avatar>
                    <x-ux::avatar.image src="https://github.com/maxleiter.png" class="grayscale" />
                    <x-ux::avatar.fallback>M</x-ux::avatar.fallback>
                </x-ux::avatar>
            </x-ux::item.media>
            <x-ux::item.content class="gap-1">
                <x-ux::item.title>maxleiter</x-ux::item.title>
                <x-ux::item.description>maxleiter@vercel.com</x-ux::item.description>
            </x-ux::item.content>
            <x-ux::item.actions>
                <x-ux::button variant="ghost" size="icon" class="rounded-full">
                    <x-ux::icon name="plus" />
                </x-ux::button>
            </x-ux::item.actions>
        </x-ux::item>
        <x-ux::item.separator />
        <x-ux::item>
            <x-ux::item.media>
                <x-ux::avatar>
                    <x-ux::avatar.image src="https://github.com/evilrabbit.png" class="grayscale" />
                    <x-ux::avatar.fallback>E</x-ux::avatar.fallback>
                </x-ux::avatar>
            </x-ux::item.media>
            <x-ux::item.content class="gap-1">
                <x-ux::item.title>evilrabbit</x-ux::item.title>
                <x-ux::item.description>evilrabbit@vercel.com</x-ux::item.description>
            </x-ux::item.content>
            <x-ux::item.actions>
                <x-ux::button variant="ghost" size="icon" class="rounded-full">
                    <x-ux::icon name="plus" />
                </x-ux::button>
            </x-ux::item.actions>
        </x-ux::item>
    </x-ux::item.group>
</div>
```

### Header

```blade preview
<div class="flex w-full max-w-xl flex-col gap-6">
    <x-ux::item.group class="grid grid-cols-3 gap-4">
        <x-ux::item variant="outline">
            <x-ux::item.header>
                <img
                    src="https://images.unsplash.com/photo-1650804068570-7fb2e3dbf888?q=80&w=640&auto=format&fit=crop"
                    alt="v0-1.5-sm"
                    width="128"
                    height="128"
                    class="aspect-square w-full rounded-sm object-cover"
                />
            </x-ux::item.header>
            <x-ux::item.content>
                <x-ux::item.title>v0-1.5-sm</x-ux::item.title>
                <x-ux::item.description>Everyday tasks and UI generation.</x-ux::item.description>
            </x-ux::item.content>
        </x-ux::item>
        <x-ux::item variant="outline">
            <x-ux::item.header>
                <img
                    src="https://images.unsplash.com/photo-1610280777472-54133d004c8c?q=80&w=640&auto=format&fit=crop"
                    alt="v0-1.5-lg"
                    width="128"
                    height="128"
                    class="aspect-square w-full rounded-sm object-cover"
                />
            </x-ux::item.header>
            <x-ux::item.content>
                <x-ux::item.title>v0-1.5-lg</x-ux::item.title>
                <x-ux::item.description>Advanced thinking or reasoning.</x-ux::item.description>
            </x-ux::item.content>
        </x-ux::item>
        <x-ux::item variant="outline">
            <x-ux::item.header>
                <img
                    src="https://images.unsplash.com/photo-1602146057681-08560aee8cde?q=80&w=640&auto=format&fit=crop"
                    alt="v0-2.0-mini"
                    width="128"
                    height="128"
                    class="aspect-square w-full rounded-sm object-cover"
                />
            </x-ux::item.header>
            <x-ux::item.content>
                <x-ux::item.title>v0-2.0-mini</x-ux::item.title>
                <x-ux::item.description>Open Source model for everyone.</x-ux::item.description>
            </x-ux::item.content>
        </x-ux::item>
    </x-ux::item.group>
</div>
```

### Link

To render an item as a link, use the `asChild` prop. The hover and focus states will be applied to the anchor element.

```blade preview
<div class="flex w-full max-w-md flex-col gap-4">
    <x-ux::item as-child>
        <a href="#">
            <x-ux::item.content>
                <x-ux::item.title>Visit our documentation</x-ux::item.title>
                <x-ux::item.description>
                    Learn how to get started with our components.
                </x-ux::item.description>
            </x-ux::item.content>
            <x-ux::item.actions>
                <x-ux::icon name="chevron-right" class="size-4" />
            </x-ux::item.actions>
        </a>
    </x-ux::item>
    <x-ux::item variant="outline" as-child>
        <a href="#" target="_blank" rel="noopener noreferrer">
            <x-ux::item.content>
                <x-ux::item.title>External resource</x-ux::item.title>
                <x-ux::item.description>
                    Opens in a new tab with security attributes.
                </x-ux::item.description>
            </x-ux::item.content>
            <x-ux::item.actions>
                <x-ux::icon name="external-link" class="size-4" />
            </x-ux::item.actions>
        </a>
    </x-ux::item>
</div>
```

### Dropdown

```blade preview
<div class="flex w-full max-w-md flex-col gap-6">
    <x-ux::dropdown-menu>
        <x-ux::dropdown-menu.trigger as-child>
            <x-ux::button variant="outline" size="sm" class="w-fit">
                Select <x-ux::icon name="chevron-down" />
            </x-ux::button>
        </x-ux::dropdown-menu.trigger>
        <x-ux::dropdown-menu.content class="w-72 [--radius:0.65rem]" align="end">
            <x-ux::dropdown-menu.item class="p-0">
                <x-ux::item size="sm" class="w-full p-2">
                    <x-ux::item.media>
                        <x-ux::avatar class="size-8">
                            <x-ux::avatar.image src="https://github.com/shadcn.png" class="grayscale" />
                            <x-ux::avatar.fallback>S</x-ux::avatar.fallback>
                        </x-ux::avatar>
                    </x-ux::item.media>
                    <x-ux::item.content class="gap-0.5">
                        <x-ux::item.title>shadcn</x-ux::item.title>
                        <x-ux::item.description>shadcn@vercel.com</x-ux::item.description>
                    </x-ux::item.content>
                </x-ux::item>
            </x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item class="p-0">
                <x-ux::item size="sm" class="w-full p-2">
                    <x-ux::item.media>
                        <x-ux::avatar class="size-8">
                            <x-ux::avatar.image src="https://github.com/maxleiter.png" class="grayscale" />
                            <x-ux::avatar.fallback>M</x-ux::avatar.fallback>
                        </x-ux::avatar>
                    </x-ux::item.media>
                    <x-ux::item.content class="gap-0.5">
                        <x-ux::item.title>maxleiter</x-ux::item.title>
                        <x-ux::item.description>maxleiter@vercel.com</x-ux::item.description>
                    </x-ux::item.content>
                </x-ux::item>
            </x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item class="p-0">
                <x-ux::item size="sm" class="w-full p-2">
                    <x-ux::item.media>
                        <x-ux::avatar class="size-8">
                            <x-ux::avatar.image src="https://github.com/evilrabbit.png" class="grayscale" />
                            <x-ux::avatar.fallback>E</x-ux::avatar.fallback>
                        </x-ux::avatar>
                    </x-ux::item.media>
                    <x-ux::item.content class="gap-0.5">
                        <x-ux::item.title>evilrabbit</x-ux::item.title>
                        <x-ux::item.description>evilrabbit@vercel.com</x-ux::item.description>
                    </x-ux::item.content>
                </x-ux::item>
            </x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.content>
    </x-ux::dropdown-menu>
</div>
```

## API Reference

### Root

The main component for displaying content with media, title, description, and actions.

| Prop      | Type                                                                                                              | Default     |
|-----------|-------------------------------------------------------------------------------------------------------------------|-------------|
| `size`    | `enum` [?"default" \| "sm"]                                                                                       | `"default"` |
| `variant` | `enum` [?"default" \| "outline" \| "muted"]                                                                       | `"default"` |
| `asChild` | `boolean` [?Change the default rendered element for the one passed as a child, merging their props and behavior.] | `false`     |

### Media

The component to display media content such as icons, images, or avatars.

| Prop      | Type                                     | Default     |
|-----------|------------------------------------------|-------------|
| `variant` | `enum` [?"default" \| "icon" \| "image"] | `"default"` |


## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-button-group --force
```
