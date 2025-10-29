# Skeleton

Use to show a placeholder while content is loading.

```blade preview
<div class="flex items-center space-x-4">
    <x-ux::skeleton class="h-12 w-12 rounded-full" />
    <div class="space-y-2">
        <x-ux::skeleton class="h-4 w-[250px]" />
        <x-ux::skeleton class="h-4 w-[200px]" />
    </div>
</div>
```

## Usage

```blade
<x-ux::skeleton class="h-[20px] w-[100px] rounded-full" />
```

## Examples

### Card

```blade preview
<div class="flex flex-col space-y-3">
    <x-ux::skeleton class="h-[125px] w-[250px] rounded-xl" />
    <div class="space-y-2">
        <x-ux::skeleton class="h-4 w-[250px]" />
        <x-ux::skeleton class="h-4 w-[200px]" />
    </div>
</div>
```

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-skeleton --force
```
