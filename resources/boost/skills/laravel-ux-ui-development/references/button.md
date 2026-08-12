# Button

Use Button for actions and for links that need button styling. Choose semantics first, then variant and size.

## API

### `x-ux::button`

| Prop      | Type                                                    | Default   | Purpose                   |
|-----------|---------------------------------------------------------|-----------|---------------------------|
| `variant` | `default\|outline\|ghost\|destructive\|secondary\|link` | `default` | Set the visual treatment. |
| `size`    | `default\|xs\|sm\|lg\|icon\|icon-xs\|icon-sm\|icon-lg`  | `default` | Set button dimensions.    |

Button accepts standard button or anchor attributes. It renders an `<a>` when `href` is present and a
`<button type="button">` otherwise.

## Actions and Links

Use a button for an action:

```blade
<x-ux::button type="submit">Save changes</x-ux::button>
```

Use `href` for navigation:

```blade
<x-ux::button href="{{ route('dashboard') }}" variant="secondary" wire:navigate>
    Dashboard
</x-ux::button>
```

Do not simulate navigation with `wire:click` when a real URL exists. Do not add `role="button"` to links rendered by
this component.

The default button type is `button`, which prevents accidental form submission. Pass `type="submit"` explicitly for form
submission and `type="reset"` only when reset behavior is intentional.

## Variants

```blade
<div class="flex flex-wrap gap-2">
    <x-ux::button>Default</x-ux::button>
    <x-ux::button variant="outline">Outline</x-ux::button>
    <x-ux::button variant="secondary">Secondary</x-ux::button>
    <x-ux::button variant="ghost">Ghost</x-ux::button>
    <x-ux::button variant="destructive">Destructive</x-ux::button>
    <x-ux::button variant="link">Link</x-ux::button>
</div>
```

- Use `default` for the primary action.
- Use `outline` or `secondary` for supporting actions.
- Use `ghost` for low-emphasis actions in toolbars and menus.
- Use `destructive` only for destructive or high-risk operations.
- Use `link` for button-triggered actions styled like text. For navigation, prefer `href` with a suitable visual
  variant.

## Sizes

Text sizes are `xs`, `sm`, `default`, and `lg`. Icon-only equivalents are `icon-xs`, `icon-sm`, `icon`, and `icon-lg`.

```blade
<x-ux::button size="sm">Save</x-ux::button>

<x-ux::button size="icon-sm" variant="ghost" aria-label="Open settings">
    <x-ux::icon name="settings-2" />
</x-ux::button>
```

Every icon-only button requires an accessible name through `aria-label` or equivalent labelled content.

## Icons

Mark icon position so Button adjusts inline padding in LTR and RTL:

```blade
<x-ux::button variant="outline">
    <x-ux::icon name="git-branch" data-icon="inline-start" />
    New Branch
</x-ux::button>

<x-ux::button variant="outline">
    Continue
    <x-ux::icon name="arrow-right" data-icon="inline-end" class="rtl:rotate-180" />
</x-ux::button>
```

Do not add manual `ml-*` or `mr-*` spacing. Reverse only directional icons in RTL.

## Loading State

Disable an action while its request is running and keep its label stable:

```blade
<x-ux::button type="submit" wire:loading.attr="disabled" wire:target="save">
    <x-ux::spinner wire:loading wire:target="save" data-icon="inline-start" />
    Save changes
</x-ux::button>
```

If replacing the label, keep a fixed width or an accessible status when layout shift matters. `disabled` prevents
interaction but does not automatically announce progress; use an appropriate live region for long operations.

## Button Group and Dropdown Trigger

Compose grouped actions with Button Group. Use `as-child` when Button is the trigger so only one interactive element is
rendered:

```blade
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger as-child>
        <x-ux::button size="icon" variant="outline" aria-label="More options">
            <x-ux::icon name="ellipsis" />
        </x-ux::button>
    </x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content align="end">
        <x-ux::dropdown-menu.item>Archive</x-ux::dropdown-menu.item>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

Do not nest a `<button>` inside another `<button>`.

## Disabled State

```blade
<x-ux::button disabled>Unavailable</x-ux::button>
```

For an anchor rendered through `href`, prefer removing the link when navigation is unavailable. HTML anchors do not
support the native `disabled` attribute.

## Accessibility and RTL

- Keep labels action-oriented and concise.
- Use one primary action per local decision area when possible.
- Provide `aria-label` for every icon-only button.
- Preserve visible focus styles; do not remove the built-in outline and ring.
- Do not communicate destructive or disabled state by color alone.
- Use logical `inline-start` and `inline-end` icon hooks.
- Mirror arrows and chevrons only when they express reading or navigation direction.

## Avoid

- Do not use React names, JSX, `className`, or `onClick` in Blade.
- Do not use Button for a link without `href`.
- Do not use `href` for a form submission or state mutation.
- Do not omit `type="submit"` on an intended form submit button.
- Do not manually recreate built-in variants or sizes with repeated Tailwind classes.
- Do not add custom JavaScript for hover, pressed, disabled, or loading visuals already handled by CSS and Livewire
  attributes.
