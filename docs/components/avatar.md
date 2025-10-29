# Avatar

An image element with a fallback for representing the user.

```blade preview
<div class="flex flex-row flex-wrap items-center gap-4">
    <x-ux::avatar>
        <x-ux::avatar.image src="https://github.com/shadcn.png" alt="@shadcn" />
        <x-ux::avatar.fallback>CN</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar>
        <x-ux::avatar.fallback>CN</x-ux::avatar.fallback>
    </x-ux::avatar>
</div>
```

## Usage

```blade
<x-ux::avatar>
  <x-ux::avatar.image src="https://github.com/shadcn.png" />
  <x-ux::avatar.fallback>CN</x-ux::avatar.fallback>
</x-ux::avatar>
```

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-avatar --force
```
