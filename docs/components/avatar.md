# Avatar

An image element with a fallback for representing the user.

```blade preview
<div class="flex flex-row flex-wrap items-center gap-12">
    <x-ux::avatar>
        <x-ux::avatar.image src="https://github.com/laravel.png" alt="@laravel" />
        <x-ux::avatar.fallback>LA</x-ux::avatar.fallback>
        <x-ux::avatar.badge />
    </x-ux::avatar>
    <x-ux::avatar class="rounded-lg after:rounded-lg">
        <x-ux::avatar.image src="https://github.com/laravel-news.png" alt="Laravel News" class="rounded-lg" />
        <x-ux::avatar.fallback class="rounded-lg">LN</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar.group>
        <x-ux::avatar>
            <x-ux::avatar.image src="https://github.com/laravel.png" alt="@laravel" />
            <x-ux::avatar.fallback>LA</x-ux::avatar.fallback>
        </x-ux::avatar>
        <x-ux::avatar>
            <x-ux::avatar.image src="https://github.com/livewire.png" alt="Livewire" />
            <x-ux::avatar.fallback>LW</x-ux::avatar.fallback>
        </x-ux::avatar>
        <x-ux::avatar>
            <x-ux::avatar.image src="https://github.com/laravel-news.png" alt="Laravel News" />
            <x-ux::avatar.fallback>LN</x-ux::avatar.fallback>
        </x-ux::avatar>
        <x-ux::avatar.group-count>+3</x-ux::avatar.group-count>
    </x-ux::avatar.group>
</div>
```

## Usage

```blade
<x-ux::avatar>
    <x-ux::avatar.image src="https://github.com/laravel.png" alt="@laravel" />
    <x-ux::avatar.fallback>LA</x-ux::avatar.fallback>
</x-ux::avatar>
```

## Composition

Use the following composition to build an `x-ux::avatar`:

```text
x-ux::avatar
├── x-ux::avatar.image
├── x-ux::avatar.fallback
└── x-ux::avatar.badge
```

Use the following composition to build an `x-ux::avatar.group`:

```text
x-ux::avatar.group
├── x-ux::avatar
│   ├── x-ux::avatar.image
│   ├── x-ux::avatar.fallback
│   └── x-ux::avatar.badge
├── x-ux::avatar
│   ├── x-ux::avatar.image
│   ├── x-ux::avatar.fallback
│   └── x-ux::avatar.badge
└── x-ux::avatar.group-count
```

## Basic

A basic avatar component with an image and a fallback.

```blade preview
<x-ux::avatar>
    <x-ux::avatar.image src="https://github.com/laravel.png" alt="@laravel" />
    <x-ux::avatar.fallback>LA</x-ux::avatar.fallback>
</x-ux::avatar>
```

## Badge

Use `x-ux::avatar.badge` to add a badge to the avatar. The badge is positioned at the bottom inline-end of the avatar.

```blade preview
<x-ux::avatar>
    <x-ux::avatar.image src="https://github.com/laravel.png" alt="@laravel" />
    <x-ux::avatar.fallback>LA</x-ux::avatar.fallback>
    <x-ux::avatar.badge class="bg-green-600 dark:bg-green-800" />
</x-ux::avatar>
```

## Badge with Icon

You can also use an icon inside `x-ux::avatar.badge`.

```blade preview
<x-ux::avatar size="lg">
    <x-ux::avatar.image src="https://github.com/livewire.png" alt="Livewire" />
    <x-ux::avatar.fallback>LW</x-ux::avatar.fallback>
    <x-ux::avatar.badge>
        <x-ux::icon name="plus" />
    </x-ux::avatar.badge>
</x-ux::avatar>
```

## Avatar Group

Use `x-ux::avatar.group` to add a group of avatars.

```blade preview
<x-ux::avatar.group>
    <x-ux::avatar>
        <x-ux::avatar.image src="https://github.com/laravel.png" alt="@laravel" />
        <x-ux::avatar.fallback>LA</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar>
        <x-ux::avatar.image src="https://github.com/livewire.png" alt="Livewire" />
        <x-ux::avatar.fallback>LW</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar>
        <x-ux::avatar.image src="https://github.com/laravel-news.png" alt="Laravel News" />
        <x-ux::avatar.fallback>LN</x-ux::avatar.fallback>
    </x-ux::avatar>
</x-ux::avatar.group>
```

## Avatar Group Count

Use `x-ux::avatar.group-count` to add a count to the group.

```blade preview
<x-ux::avatar.group>
    <x-ux::avatar>
        <x-ux::avatar.image src="https://github.com/laravel.png" alt="@laravel" />
        <x-ux::avatar.fallback>LA</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar>
        <x-ux::avatar.image src="https://github.com/livewire.png" alt="Livewire" />
        <x-ux::avatar.fallback>LW</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar>
        <x-ux::avatar.image src="https://github.com/laravel-news.png" alt="Laravel News" />
        <x-ux::avatar.fallback>LN</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar.group-count>+3</x-ux::avatar.group-count>
</x-ux::avatar.group>
```

## Avatar Group with Icon

You can also use an icon inside `x-ux::avatar.group-count`.

```blade preview
<x-ux::avatar.group>
    <x-ux::avatar>
        <x-ux::avatar.image src="https://github.com/laravel.png" alt="@laravel" />
        <x-ux::avatar.fallback>LA</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar>
        <x-ux::avatar.image src="https://github.com/livewire.png" alt="Livewire" />
        <x-ux::avatar.fallback>LW</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar>
        <x-ux::avatar.image src="https://github.com/laravel-news.png" alt="Laravel News" />
        <x-ux::avatar.fallback>LN</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar.group-count>
        <x-ux::icon name="plus" />
    </x-ux::avatar.group-count>
</x-ux::avatar.group>
```

## Sizes

Use the `size` prop to change the size of the avatar.

```blade preview
<div class="flex flex-wrap items-center gap-2">
    <x-ux::avatar size="sm">
        <x-ux::avatar.image src="https://github.com/laravel.png" alt="@laravel" />
        <x-ux::avatar.fallback>LA</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar>
        <x-ux::avatar.image src="https://github.com/laravel.png" alt="@laravel" />
        <x-ux::avatar.fallback>LA</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar size="lg">
        <x-ux::avatar.image src="https://github.com/laravel.png" alt="@laravel" />
        <x-ux::avatar.fallback>LA</x-ux::avatar.fallback>
    </x-ux::avatar>
</div>
```

## Dropdown

You can use `x-ux::avatar` as a trigger for a dropdown menu.

```blade preview
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger as-child>
        <button type="button" class="rounded-full">
            <x-ux::avatar>
                <x-ux::avatar.image src="https://github.com/laravel.png" alt="@laravel" />
                <x-ux::avatar.fallback>LA</x-ux::avatar.fallback>
            </x-ux::avatar>
        </button>
    </x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content>
        <x-ux::dropdown-menu.item>Profile</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.item>Settings</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.item>Log out</x-ux::dropdown-menu.item>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

## RTL

Set `dir="rtl"` when the avatar group is displayed in a right-to-left interface.

```blade preview
<x-ux::avatar.group dir="rtl">
    <x-ux::avatar>
        <x-ux::avatar.image src="https://github.com/laravel.png" alt="@laravel" />
        <x-ux::avatar.fallback>LA</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar>
        <x-ux::avatar.image src="https://github.com/laravel-news.png" alt="Laravel News" />
        <x-ux::avatar.fallback>LN</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar.group-count>+٣</x-ux::avatar.group-count>
</x-ux::avatar.group>
```

## API Reference

### x-ux::avatar

| Prop   | Type                                      | Default     |
|--------|-------------------------------------------|-------------|
| `size` | `enum` [?"default" \| "sm" \| "lg"]      | `"default"` |

### x-ux::avatar.image

| Prop   | Type     | Default |
|--------|----------|---------|
| `src*` | `string` | -       |
| `alt`  | `string` | `""`    |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-avatar --force
```
