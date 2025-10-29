# Progress

Displays an indicator showing the completion progress of a task, typically displayed as a progress bar.

```blade preview
<x-ux::progress :value=60 class="w-[60%]" />
```

## Usage

```blade
<x-ux::progress :value=33 />
```

### Root

Contains all of the progress parts.

| Prop    | Type     | Default |
|---------|----------|---------|
| `value` | `number` | 0       |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-progress --force
```
