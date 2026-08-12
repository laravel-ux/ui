# Skeleton

Use to show a placeholder while content is loading.

```blade preview
<div class="flex items-center gap-4">
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

### Avatar

```blade preview
<div class="flex w-fit items-center gap-4">
    <x-ux::skeleton class="size-10 shrink-0 rounded-full" />
    <div class="grid gap-2">
        <x-ux::skeleton class="h-4 w-[150px]" />
        <x-ux::skeleton class="h-4 w-[100px]" />
    </div>
</div>
```

### Card

```blade preview
<x-ux::card class="w-full max-w-xs">
    <x-ux::card.header>
        <x-ux::skeleton class="h-4 w-2/3" />
        <x-ux::skeleton class="h-4 w-1/2" />
    </x-ux::card.header>
    <x-ux::card.content>
        <x-ux::skeleton class="aspect-video w-full" />
    </x-ux::card.content>
</x-ux::card>
```

### Text

```blade preview
<div class="flex w-full max-w-xs flex-col gap-2">
    <x-ux::skeleton class="h-4 w-full" />
    <x-ux::skeleton class="h-4 w-full" />
    <x-ux::skeleton class="h-4 w-3/4" />
</div>
```

### Form

```blade preview
<div class="flex w-full max-w-xs flex-col gap-7">
    <div class="flex flex-col gap-3">
        <x-ux::skeleton class="h-4 w-20" />
        <x-ux::skeleton class="h-8 w-full" />
    </div>
    <div class="flex flex-col gap-3">
        <x-ux::skeleton class="h-4 w-24" />
        <x-ux::skeleton class="h-8 w-full" />
    </div>
    <x-ux::skeleton class="h-8 w-24" />
</div>
```

### Table

```blade preview
<div class="flex w-full max-w-sm flex-col gap-2">
    @foreach (range(1, 5) as $index)
        <div class="flex gap-4">
            <x-ux::skeleton class="h-4 flex-1" />
            <x-ux::skeleton class="h-4 w-24" />
            <x-ux::skeleton class="h-4 w-20" />
        </div>
    @endforeach
</div>
```

## RTL

Wrap isolated right-to-left skeleton layouts with `x-ux::direction`.

```blade preview
<div class="flex items-center gap-4" dir="rtl">
        <x-ux::skeleton class="h-12 w-12 rounded-full" />
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
