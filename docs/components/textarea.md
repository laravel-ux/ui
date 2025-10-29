# Textarea

Displays a form textarea or a component that looks like a textarea.

```blade preview
<div class="grid w-full max-w-sm items-center">
    <x-ux::textarea placeholder="Type your message here." />
</div>
```

## Usage

```blade
<x-ux::textarea />
```

## Examples

### Default

```blade preview
<div class="grid w-full max-w-sm items-center">
    <x-ux::textarea placeholder="Type your message here." />
</div>
```

### Disabled

```blade preview
<div class="grid w-full max-w-sm items-center">
    <x-ux::textarea disabled placeholder="Type your message here." />
</div>
```

### With Label

```blade preview
<div class="grid w-full max-w-sm items-center gap-3">
    <x-ux::label for="message">Your message</x-ux::label>
    <x-ux::textarea id="message" placeholder="Type your message here." />
</div>
```

### With Button

```blade preview
<div class="grid w-full max-w-sm gap-2">
    <x-ux::textarea placeholder="Type your message here." />
    <x-ux::button>Send message</x-ux::button>
</div>
```

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-input --force
```
