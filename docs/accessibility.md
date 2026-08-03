# Accessibility

Laravel UX UI components include semantic structure, keyboard behavior, and state attributes where the component
pattern requires them.

## Preserve the composition

Keep documented subcomponents together. A Dialog needs its trigger and content composition; a Field should keep its
label, control, description, and error relationships intact.

```blade
<x-ux::field>
    <x-ux::field.label for="company">Company</x-ux::field.label>
    <x-ux::input id="company" aria-describedby="company-help" />
    <x-ux::field.description id="company-help">
        Use the name shown on invoices.
    </x-ux::field.description>
</x-ux::field>
```

## Icon-only controls

Give icon-only buttons and links an accessible name on the interactive component.

```blade preview
<x-ux::button variant="outline" size="icon" aria-label="Open settings">
    <x-ux::icon name="settings-2" />
</x-ux::button>
```

## Disabled state

Use the component's documented `disabled` prop or native attribute instead of relying on visual opacity alone.

```blade
<x-ux::button disabled>Save changes</x-ux::button>
```

## Focus and keyboard behavior

Avoid removing focus-visible styles. Components such as Dialog, Dropdown Menu, Select, Tabs, and Accordion already
implement their expected keyboard interactions; custom handlers should not override them.

## Right-to-left interfaces

Set `dir="rtl"` on the relevant interface boundary. Components use logical spacing where possible, and directional
icons can be mirrored with `rtl:rotate-180` when their meaning follows reading direction.

Always test the final application with keyboard navigation, zoom, and the actual validation and loading states it
will display.
