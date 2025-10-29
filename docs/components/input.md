# Input

Displays a form input field or a component that looks like an input field.

```blade preview
<div class="grid w-full max-w-sm items-center">
    <x-ux::input type="email" placeholder="Email" />
</div>
```

## Usage

```blade
<x-ux::input />
```

## Examples

### Default

```blade preview
<div class="grid w-full max-w-sm items-center">
    <x-ux::input type="email" placeholder="Email" />
</div>
```

### File

```blade preview
<div class="grid w-full max-w-sm items-center gap-3">
    <x-ux::label for="picture">Picture</x-ux::label>
    <x-ux::input id="picture" type="file" />
</div>
```

### Disabled

```blade preview
<div class="grid w-full max-w-sm items-center">
    <x-ux::input disabled type="email" placeholder="Email" />
</div>
```

### With Label

```blade preview
<div class="grid w-full max-w-sm items-center gap-3">
    <x-ux::label for="email">Email</x-ux::label>
    <x-ux::input id="email" type="email" placeholder="Email" />
</div>
```

### With Button

```blade preview
<div class="flex w-full max-w-sm items-center gap-2">
    <x-ux::input type="email" placeholder="Email" />
    <x-ux::button>Subscribe</x-ux::button>
</div>
```

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-input --force
```
