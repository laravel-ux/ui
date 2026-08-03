# Styling

Laravel UX UI combines semantic design tokens with Tailwind utilities.

## Design tokens

Components use shared color variables such as `background`, `foreground`, `primary`, `muted`, `border`, and
`destructive`. Override the variables in your application stylesheet to adapt the system without editing every
component.

```css
:root {
    --primary: oklch(0.24 0.02 260);
    --primary-foreground: oklch(0.98 0 0);
    --radius: 0.75rem;
}
```

## Tailwind classes

Use `class` for layout, responsive behavior, and deliberate visual overrides.

```blade preview
<div class="flex flex-col gap-3 sm:flex-row">
    <x-ux::button class="sm:min-w-36">Continue</x-ux::button>
    <x-ux::button variant="outline" class="sm:min-w-36">Go back</x-ux::button>
</div>
```

The component merges Tailwind classes so conflicting utilities passed by the application take precedence.

## Dark mode

The package tokens include a `.dark` theme. Apply the class at the document root using your application's preferred
theme persistence strategy.

```html
<html class="dark">
```

Components inherit the active tokens automatically. Add `dark:*` utilities only for application-specific styling
that is not represented by a shared token.

## Publishing a component

Components work without publishing. Publish a view only when the product needs to change its structure or deeply
customize behavior.

```shell
php artisan vendor:publish --tag=ux-button --force
```

Published views live in `resources/views/vendor/ux/components`. After publishing, your application owns that copy
and should review upstream package changes before updating it.
