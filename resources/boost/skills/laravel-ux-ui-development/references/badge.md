# Badge

Use Badge for compact labels, statuses, categories, and short metadata.

## API

### `x-ux::badge`

| Prop      | Type                                                    | Default   | Purpose                   |
|-----------|---------------------------------------------------------|-----------|---------------------------|
| `variant` | `default\|secondary\|destructive\|outline\|ghost\|link` | `default` | Set the visual treatment. |

Badge renders an `<a>` when an `href` attribute is present. Otherwise, it renders a `<span>`. It accepts standard HTML
attributes and Tailwind classes.

## Variants

```blade
<div class="flex flex-wrap items-center gap-2">
    <x-ux::badge>Default</x-ux::badge>
    <x-ux::badge variant="secondary">Secondary</x-ux::badge>
    <x-ux::badge variant="destructive">Destructive</x-ux::badge>
    <x-ux::badge variant="outline">Outline</x-ux::badge>
    <x-ux::badge variant="ghost">Ghost</x-ux::badge>
</div>
```

Use `destructive` for error or dangerous states, not as a general accent. Use `link` only when Badge has an `href`.

## Icons and Spinners

Mark leading and trailing icons with `data-icon` so Badge adjusts its inline padding automatically:

```blade
<x-ux::badge variant="secondary">
    <x-ux::icon name="badge-check" data-icon="inline-start" />
    Verified
</x-ux::badge>

<x-ux::badge variant="outline">
    Updating
    <x-ux::spinner data-icon="inline-end" />
</x-ux::badge>
```

Use `inline-start` and `inline-end`, not physical left/right spacing classes. They work correctly in both LTR and RTL
layouts.

## Links

```blade
<x-ux::badge href="{{ route('releases.show', $release) }}">
    {{ $release->version }}
</x-ux::badge>

<x-ux::badge href="{{ route('releases.index') }}" variant="link">
    View releases
    <x-ux::icon name="arrow-up-right" data-icon="inline-end" />
</x-ux::badge>
```

Badge chooses its element from the presence of `href`; do not pass an empty `href` merely to get hover styling. For
normal page navigation, `wire:navigate` can be passed with `href`.

## Dynamic Content

```blade
<x-ux::badge
    :variant="$order->isOverdue() ? 'destructive' : 'secondary'"
    wire:key="order-status-{{ $order->id }}"
>
    {{ $order->status->label() }}
</x-ux::badge>
```

Keep the value supplied to `variant` within the documented enum. Use Tailwind classes for product-specific colors rather
than inventing undocumented variant names.

## Accessibility and RTL

- Keep labels concise and understandable without relying on color alone.
- Do not use Badge as an interactive control. Use a button for an action and a link with `href` for navigation.
- Provide adjacent text or an accessible label when an icon-only status needs explanation.
- Use `data-icon="inline-start"` and `data-icon="inline-end"` for direction-aware icon spacing.

## Avoid

- Do not paste React `Badge` markup or `className` into Blade.
- Do not add click handlers to a non-link Badge.
- Do not emulate built-in variants with repeated color classes.
- Do not use `rounded-full`, height, and padding overrides merely to recreate the default shape.
