# Label

Renders an accessible label associated with controls.

```blade preview
<div class="flex items-center space-x-2">
    <x-ux::checkbox id="terms" />
    <x-ux::label for="terms">Accept terms and conditions</x-ux::label>
</div>
```

## Usage

```blade
<x-ux::label for="email">Your email address</x-ux::label>
```

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-label --force
```

