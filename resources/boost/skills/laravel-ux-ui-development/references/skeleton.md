# Skeleton

Use `x-ux::skeleton` to show a placeholder while content is loading.

## API

Skeleton has no custom props. Set its dimensions and shape with Tailwind classes. It renders with `data-slot="skeleton"`,
an animated pulse, a muted background, and a medium border radius by default.

## Basic Example

```blade
<div class="flex items-center gap-4">
    <x-ux::skeleton class="size-12 rounded-full" />
    <div class="space-y-2">
        <x-ux::skeleton class="h-4 w-64" />
        <x-ux::skeleton class="h-4 w-48" />
    </div>
</div>
```

## Card Example

```blade
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

For other common layouts, compose Skeleton elements to mirror avatars, text lines, form labels and inputs, or table
rows. Wrap isolated right-to-left layouts with `x-ux::direction`.

## Rules

- Match the placeholder's size, shape, and layout closely to the content it replaces to reduce layout shift.
- Use several Skeleton elements to represent distinct text lines, media, and controls; do not put real content inside one.
- Use `rounded-full` for circular avatars and the default radius for text or rectangular regions.
- Keep Skeleton decorative. Put loading status on the containing region with appropriate visible or assistive text when
  users need progress feedback.
- Do not make Skeleton interactive or add click, keyboard, form, or focus behavior.
- Do not use Skeleton for an indeterminate operation after content has already loaded; use Progress or Spinner instead.
