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

## Composition

```text
x-ux::item.group
└── x-ux::item
    ├── x-ux::item.header
    ├── x-ux::item.media
    ├── x-ux::item.content
    │   ├── x-ux::item.title
    │   └── x-ux::item.description
    ├── x-ux::item.actions
    └── x-ux::item.footer
```

## Item vs Field

Use x-ux::field if you need to display a form input such as a checkbox, input, radio, or select.

If you only need to display content such as a title, description, and actions, use x-ux::item.

## Variant

```blade preview
<div class="flex flex-col gap-6">
    <x-ux::item>
        <x-ux::item.media variant="icon"><x-ux::icon name="inbox" /></x-ux::item.media>
        <x-ux::item.content>
            <x-ux::item.title>Default Variant</x-ux::item.title>
            <x-ux::item.description>Transparent background with no border.</x-ux::item.description>
        </x-ux::item.content>
    </x-ux::item>
    <x-ux::item variant="outline">
        <x-ux::item.media variant="icon"><x-ux::icon name="inbox" /></x-ux::item.media>
        <x-ux::item.content>
            <x-ux::item.title>Outline Variant</x-ux::item.title>
            <x-ux::item.description>Outlined style with a visible border.</x-ux::item.description>
        </x-ux::item.content>
    </x-ux::item>
    <x-ux::item variant="muted">
        <x-ux::item.media variant="icon"><x-ux::icon name="inbox" /></x-ux::item.media>
        <x-ux::item.content>
            <x-ux::item.title>Muted Variant</x-ux::item.title>
            <x-ux::item.description>Muted background for secondary content.</x-ux::item.description>
        </x-ux::item.content>
    </x-ux::item>
</div>
```

## Size

Use `size` to switch between `default`, `sm`, and `xs`.

```blade preview
<div class="flex w-full max-w-md flex-col gap-6">
    <x-ux::item variant="outline">
        <x-ux::item.media variant="icon"><x-ux::icon name="inbox" /></x-ux::item.media>
        <x-ux::item.content>
            <x-ux::item.title>Default Size</x-ux::item.title>
            <x-ux::item.description>The standard size for most use cases.</x-ux::item.description>
        </x-ux::item.content>
    </x-ux::item>
    <x-ux::item variant="outline" size="sm">
        <x-ux::item.media variant="icon"><x-ux::icon name="inbox" /></x-ux::item.media>
        <x-ux::item.content>
            <x-ux::item.title>Small Size</x-ux::item.title>
            <x-ux::item.description>A compact size for dense layouts.</x-ux::item.description>
        </x-ux::item.content>
    </x-ux::item>
    <x-ux::item variant="outline" size="xs">
        <x-ux::item.media variant="icon"><x-ux::icon name="inbox" /></x-ux::item.media>
        <x-ux::item.content>
            <x-ux::item.title>Extra Small Size</x-ux::item.title>
            <x-ux::item.description>The most compact size available.</x-ux::item.description>
        </x-ux::item.content>
    </x-ux::item>
</div>
```

## Icon

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

## Avatar

```blade preview
<div class="flex w-full max-w-lg flex-col gap-6">
    <x-ux::item variant="outline">
        <x-ux::item.media>
            <x-ux::avatar class="size-10">
                <x-ux::avatar.image src="https://github.com/laravel.png" alt="Laravel" />
                <x-ux::avatar.fallback>LA</x-ux::avatar.fallback>
            </x-ux::avatar>
        </x-ux::item.media>
        <x-ux::item.content>
            <x-ux::item.title>Laravel</x-ux::item.title>
            <x-ux::item.description>The PHP framework for web artisans</x-ux::item.description>
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
            <div class="*:data-[slot=avatar]:ring-background flex -space-x-2 rtl:space-x-reverse *:data-[slot=avatar]:ring-2 *:data-[slot=avatar]:grayscale">
                <x-ux::avatar class="hidden sm:flex">
                    <x-ux::avatar.image src="https://github.com/laravel.png" alt="@laravel" />
                    <x-ux::avatar.fallback>LA</x-ux::avatar.fallback>
                </x-ux::avatar>
                <x-ux::avatar class="hidden sm:flex">
                    <x-ux::avatar.image
                        src="https://github.com/livewire.png"
                        alt="Livewire"
                    />
                    <x-ux::avatar.fallback>LW</x-ux::avatar.fallback>
                </x-ux::avatar>
                <x-ux::avatar>
                    <x-ux::avatar.image
                        src="https://github.com/laravel-news.png"
                        alt="Laravel News"
                    />
                    <x-ux::avatar.fallback>LN</x-ux::avatar.fallback>
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

## Image

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

## Group

```blade preview
<div class="flex w-full max-w-md flex-col gap-6">
    <x-ux::item.group>
        <x-ux::item>
            <x-ux::item.media>
                <x-ux::avatar>
                    <x-ux::avatar.image src="https://github.com/laravel.png" class="grayscale" />
                    <x-ux::avatar.fallback>S</x-ux::avatar.fallback>
                </x-ux::avatar>
            </x-ux::item.media>
            <x-ux::item.content class="gap-1">
                <x-ux::item.title>Laravel</x-ux::item.title>
                <x-ux::item.description>taylor@laravel.com</x-ux::item.description>
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
                    <x-ux::avatar.image src="https://github.com/livewire.png" class="grayscale" />
                    <x-ux::avatar.fallback>LW</x-ux::avatar.fallback>
                </x-ux::avatar>
            </x-ux::item.media>
            <x-ux::item.content class="gap-1">
                <x-ux::item.title>Livewire</x-ux::item.title>
                <x-ux::item.description>caleb@laravel.com</x-ux::item.description>
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
                    <x-ux::avatar.image src="https://github.com/laravel-news.png" class="grayscale" />
                    <x-ux::avatar.fallback>LN</x-ux::avatar.fallback>
                </x-ux::avatar>
            </x-ux::item.media>
            <x-ux::item.content class="gap-1">
                <x-ux::item.title>Laravel News</x-ux::item.title>
                <x-ux::item.description>nuno@laravel.com</x-ux::item.description>
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

## Header

```blade preview
<div class="flex w-full max-w-xl flex-col gap-6">
    <x-ux::item.group class="grid grid-cols-3 gap-4">
        <x-ux::item variant="outline">
            <x-ux::item.header>
                <img
                    src="https://images.unsplash.com/photo-1650804068570-7fb2e3dbf888?q=80&w=640&auto=format&fit=crop"
                    alt="Laravel Cloud"
                    width="128"
                    height="128"
                    class="aspect-square w-full rounded-sm object-cover"
                />
            </x-ux::item.header>
            <x-ux::item.content>
                <x-ux::item.title>Laravel Cloud</x-ux::item.title>
                <x-ux::item.description>Deploy and scale Laravel applications.</x-ux::item.description>
            </x-ux::item.content>
        </x-ux::item>
        <x-ux::item variant="outline">
            <x-ux::item.header>
                <img
                    src="https://images.unsplash.com/photo-1610280777472-54133d004c8c?q=80&w=640&auto=format&fit=crop"
                    alt="Laravel Forge"
                    width="128"
                    height="128"
                    class="aspect-square w-full rounded-sm object-cover"
                />
            </x-ux::item.header>
            <x-ux::item.content>
                <x-ux::item.title>Laravel Forge</x-ux::item.title>
                <x-ux::item.description>Provision and manage application servers.</x-ux::item.description>
            </x-ux::item.content>
        </x-ux::item>
        <x-ux::item variant="outline">
            <x-ux::item.header>
                <img
                    src="https://images.unsplash.com/photo-1602146057681-08560aee8cde?q=80&w=640&auto=format&fit=crop"
                    alt="Laravel Vapor"
                    width="128"
                    height="128"
                    class="aspect-square w-full rounded-sm object-cover"
                />
            </x-ux::item.header>
            <x-ux::item.content>
                <x-ux::item.title>Laravel Vapor</x-ux::item.title>
                <x-ux::item.description>Run Laravel on serverless infrastructure.</x-ux::item.description>
            </x-ux::item.content>
        </x-ux::item>
    </x-ux::item.group>
</div>
```

## Link

To render an item as a link, use `as-child`. The hover and focus states are applied to the anchor element.

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

## Dropdown

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
                            <x-ux::avatar.image src="https://github.com/laravel.png" class="grayscale" />
                            <x-ux::avatar.fallback>S</x-ux::avatar.fallback>
                        </x-ux::avatar>
                    </x-ux::item.media>
                    <x-ux::item.content class="gap-0.5">
                        <x-ux::item.title>Laravel</x-ux::item.title>
                        <x-ux::item.description>taylor@laravel.com</x-ux::item.description>
                    </x-ux::item.content>
                </x-ux::item>
            </x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item class="p-0">
                <x-ux::item size="sm" class="w-full p-2">
                    <x-ux::item.media>
                        <x-ux::avatar class="size-8">
                            <x-ux::avatar.image src="https://github.com/livewire.png" class="grayscale" />
                            <x-ux::avatar.fallback>LW</x-ux::avatar.fallback>
                        </x-ux::avatar>
                    </x-ux::item.media>
                    <x-ux::item.content class="gap-0.5">
                        <x-ux::item.title>Livewire</x-ux::item.title>
                        <x-ux::item.description>caleb@laravel.com</x-ux::item.description>
                    </x-ux::item.content>
                </x-ux::item>
            </x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item class="p-0">
                <x-ux::item size="sm" class="w-full p-2">
                    <x-ux::item.media>
                        <x-ux::avatar class="size-8">
                            <x-ux::avatar.image src="https://github.com/laravel-news.png" class="grayscale" />
                            <x-ux::avatar.fallback>LN</x-ux::avatar.fallback>
                        </x-ux::avatar>
                    </x-ux::item.media>
                    <x-ux::item.content class="gap-0.5">
                        <x-ux::item.title>Laravel News</x-ux::item.title>
                        <x-ux::item.description>nuno@laravel.com</x-ux::item.description>
                    </x-ux::item.content>
                </x-ux::item>
            </x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.content>
    </x-ux::dropdown-menu>
</div>
```

## RTL

```blade preview
<x-ux::direction direction="rtl">
    <div class="flex w-full max-w-md flex-col gap-6">
        <x-ux::item variant="outline">
            <x-ux::item.content>
                <x-ux::item.title>عنصر أساسي</x-ux::item.title>
                <x-ux::item.description>عنصر بسيط يحتوي على عنوان ووصف.</x-ux::item.description>
            </x-ux::item.content>
            <x-ux::item.actions>
                <x-ux::button variant="outline" size="sm">إجراء</x-ux::button>
            </x-ux::item.actions>
        </x-ux::item>
        <x-ux::item variant="outline" size="sm" as-child>
            <a href="#">
                <x-ux::item.media>
                    <x-ux::icon name="badge-check" class="size-5" />
                </x-ux::item.media>
                <x-ux::item.content>
                    <x-ux::item.title>تم التحقق من ملفك الشخصي.</x-ux::item.title>
                </x-ux::item.content>
                <x-ux::item.actions>
                    <x-ux::icon name="chevron-left" class="size-4" />
                </x-ux::item.actions>
            </a>
        </x-ux::item>
    </div>
</x-ux::direction>
```

## API Reference

### x-ux::item

| Prop       | Type                                              | Default     |
|------------|---------------------------------------------------|-------------|
| `size`     | `enum` [?"default" \| "sm" \| "xs"]                 | `"default"` |
| `variant`  | `enum` [?"default" \| "outline" \| "muted"]          | `"default"` |
| `as-child` | `boolean`                                         | `false`     |

### x-ux::item.media

| Prop      | Type                                     | Default     |
|-----------|------------------------------------------|-------------|
| `variant` | `enum` [?"default" \| "icon" \| "image"] | `"default"` |


## Publishing

```shell
php artisan vendor:publish --tag=ux-item --force
```
