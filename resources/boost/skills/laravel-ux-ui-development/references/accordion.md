# Accordion

Use Accordion for vertically stacked headings that reveal or hide associated content panels.

## Composition

```text
x-ux::accordion
└── x-ux::accordion.item
    ├── x-ux::accordion.trigger
    └── x-ux::accordion.content
```

Repeat `x-ux::accordion.item` for each panel. Keep Trigger and Content inside the same Item.

## API

### `x-ux::accordion`

| Prop       | Type            | Default | Purpose                                      |
|------------|-----------------|---------|----------------------------------------------|
| `value`    | `string\|array` | `null`  | Initially open item or items.                |
| `multiple` | `boolean`       | `false` | Allow more than one item to remain open.     |
| `disabled` | `boolean`       | `false` | Disable interaction for the whole accordion. |

### `x-ux::accordion.item`

| Prop       | Type      | Default | Purpose                            |
|------------|-----------|---------|------------------------------------|
| `value*`   | `string`  | -       | Stable unique identifier.          |
| `disabled` | `boolean` | `false` | Disable interaction for this item. |

Trigger and Content accept standard HTML attributes and Tailwind classes. The Trigger renders a button and already
includes its chevron. Content classes apply to the inner content wrapper.

## Single Item Mode

Use the default mode when at most one panel should be open. Pass a string to `value` to select the initially open item.

```blade
<x-ux::accordion value="shipping" class="w-full">
    <x-ux::accordion.item value="shipping">
        <x-ux::accordion.trigger>What shipping methods are available?</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Standard, express, and next-day delivery are available.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="returns">
        <x-ux::accordion.trigger>What is the return policy?</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Unused products may be returned within 30 days.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
</x-ux::accordion>
```

Users may close the open item, leaving every panel closed.

## Multiple Item Mode

Add `multiple` and pass an array to `value`.

```blade
<x-ux::accordion multiple :value="['notifications', 'privacy']">
    <x-ux::accordion.item value="notifications">
        <x-ux::accordion.trigger>Notifications</x-ux::accordion.trigger>
        <x-ux::accordion.content>Choose email and push notification preferences.</x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="privacy">
        <x-ux::accordion.trigger>Privacy</x-ux::accordion.trigger>
        <x-ux::accordion.content>Manage sessions and profile visibility.</x-ux::accordion.content>
    </x-ux::accordion.item>
</x-ux::accordion>
```

Do not pass a string as the intended long-term state of a multiple accordion. Use an array, including `[]` when every
item starts closed.

## Disabled State

Disable one item:

```blade
<x-ux::accordion.item value="premium" disabled>
    <x-ux::accordion.trigger>Premium feature details</x-ux::accordion.trigger>
    <x-ux::accordion.content>Upgrade to access this information.</x-ux::accordion.content>
</x-ux::accordion.item>
```

Use `disabled` on `x-ux::accordion` only when every item must ignore interaction.

## Livewire State

Bind a single accordion to a nullable string property and a multiple accordion to an array property:

```php
public ?string $openSection = null;

public array $openSections = [];
```

```blade
<x-ux::accordion wire:model="openSection">
    {{-- items --}}
</x-ux::accordion>

<x-ux::accordion multiple wire:model="openSections">
    {{-- items --}}
</x-ux::accordion>
```

Use `wire:model.live` only when the server must react immediately to every toggle. Prefer ordinary `wire:model` when the
state is client-side UI state.

## Styling Patterns

Bordered accordion:

```blade
<x-ux::accordion class="rounded-lg border">
    <x-ux::accordion.item value="billing" class="px-4">
        <x-ux::accordion.trigger>How does billing work?</x-ux::accordion.trigger>
        <x-ux::accordion.content>Billing starts at the beginning of each cycle.</x-ux::accordion.content>
    </x-ux::accordion.item>
</x-ux::accordion>
```

For rich panel content, style Content rather than rebuilding its animation wrapper:

```blade
<x-ux::accordion.content class="flex flex-col gap-4 text-balance">
    <p>First paragraph.</p>
    <p>Second paragraph.</p>
</x-ux::accordion.content>
```

Set `dir="rtl"` on the accordion or an ancestor for right-to-left content.

## Accessibility and Behavior

- Trigger already renders `type="button"`; do not nest another button inside it.
- Trigger and Content receive matching IDs, `aria-controls`, `aria-labelledby`, and `aria-expanded` automatically.
- Native Enter and Space activation are built in.
- Disabled items render a disabled Trigger.
- Content expansion and collapse are handled by the package's Alpine plugin.
- Do not add custom click handlers merely to toggle a panel. Add application handlers only for additional business
  behavior.

## Avoid

- Do not use React names such as `AccordionItem` or JSX props such as `defaultValue`.
- Do not omit Item `value` or reuse a value within the same accordion.
- Do not pass an array without `multiple`.
- Do not add a second chevron to Trigger.
- Do not manually add `x-show`, `x-collapse`, `data-state`, or ARIA state.
- Do not replace Accordion with ad hoc `<details>` markup when the task requests Laravel UX UI.
