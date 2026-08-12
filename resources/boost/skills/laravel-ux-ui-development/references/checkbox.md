# Checkbox

Use Checkbox for independent boolean choices and for selecting zero or more items from a list.

## API

### `x-ux::checkbox`

| Prop      | Type      | Default | Purpose                |
|-----------|-----------|---------|------------------------|
| `checked` | `boolean` | `false` | Set the initial state. |

Checkbox also accepts native attributes including `id`, `name`, `value`, `form`, `disabled`, and `aria-invalid`. The
default submitted value is `on`. When `name` is present, the component submits its value only while checked and enabled,
matching native checkbox behavior.

## Field Composition

Pair Checkbox with Field and FieldLabel so spacing, disabled state, invalid state, and labeling remain consistent.

```blade
<x-ux::field orientation="horizontal">
    <x-ux::checkbox id="accept-terms" name="accept_terms" />
    <x-ux::field.label for="accept-terms">
        Accept terms and conditions
    </x-ux::field.label>
</x-ux::field>
```

The Label `for` value must match the Checkbox `id`. Do not wrap Checkbox in a second button or add a custom check icon.

## Description

Use FieldContent when a label has supporting text:

```blade
<x-ux::field orientation="horizontal">
    <x-ux::checkbox id="product-updates" name="product_updates" checked />
    <x-ux::field.content>
        <x-ux::field.label for="product-updates">Product updates</x-ux::field.label>
        <x-ux::field.description>
            Receive release notes and feature announcements.
        </x-ux::field.description>
    </x-ux::field.content>
</x-ux::field>
```

Keep the description explanatory. The label should still identify the choice on its own.

## Controlled State

Use `x-model` for client-owned state:

```blade
<div x-data="{ enabled: false }">
    <x-ux::checkbox id="feature-enabled" x-model="enabled" />
</div>
```

Use `wire:model` when the server needs the current boolean value:

```blade
<x-ux::checkbox id="notifications" wire:model="notifications" />
```

Back the Livewire property with a boolean. Use ordinary `wire:model` unless immediate server-side reaction is necessary.

## Native Forms

Use `name` and `value` for ordinary form submission:

```blade
<x-ux::checkbox
    id="email-channel"
    name="channels[]"
    value="email"
    form="preferences-form"
/>
```

Unchecked and disabled checkboxes are omitted from form data. Validate absent values accordingly instead of expecting
`false` to be submitted.

## Invalid and Disabled States

Set state on both Checkbox and Field:

```blade
<x-ux::field orientation="horizontal" data-invalid>
    <x-ux::checkbox id="consent" name="consent" aria-invalid="true" />
    <x-ux::field.label for="consent">I provide consent</x-ux::field.label>
</x-ux::field>
```

```blade
<x-ux::field orientation="horizontal" data-disabled>
    <x-ux::checkbox id="managed-setting" disabled />
    <x-ux::field.label for="managed-setting">Managed by administrator</x-ux::field.label>
</x-ux::field>
```

Do not communicate invalid or disabled state only through color. Render the application's established error message near
an invalid field.

## Groups

Use FieldSet, FieldLegend, and FieldGroup for related choices:

```blade
<x-ux::field.set>
    <x-ux::field.legend variant="label">Notification channels</x-ux::field.legend>
    <x-ux::field.description>Select every channel you want to use.</x-ux::field.description>
    <x-ux::field.group class="gap-3">
        @foreach ($channels as $channel)
            <x-ux::field orientation="horizontal">
                <x-ux::checkbox
                    id="channel-{{ $channel->id }}"
                    name="channels[]"
                    value="{{ $channel->id }}"
                />
                <x-ux::field.label for="channel-{{ $channel->id }}" class="font-normal">
                    {{ $channel->name }}
                </x-ux::field.label>
            </x-ux::field>
        @endforeach
    </x-ux::field.group>
</x-ux::field.set>
```

Use stable unique IDs and values. Do not use Checkbox for a single mutually exclusive choice; use Radio Group instead.

## Accessibility and RTL

- Checkbox renders `role="checkbox"`, `aria-checked`, native button keyboard behavior, and a visible focus ring.
- Provide an accessible label for every Checkbox through `id`/`for`, an enclosing FieldLabel, or `aria-label`.
- Preserve the built-in expanded hit area; do not override its `after` pseudo-element unless the surrounding layout
  requires it.
- Set `dir="rtl"` on FieldGroup or an ancestor for right-to-left content.
- Checkbox itself is direction-neutral; use logical spacing utilities in surrounding custom layouts.

## Avoid

- Do not use React props such as `defaultChecked` or `onCheckedChange` in Blade.
- Do not manually set `data-state`, `data-checked`, or `aria-checked`; the component synchronizes them.
- Do not add custom Alpine click handlers merely to invert the state; use `x-model` for controlled behavior.
- Do not create a hidden input alongside a named Checkbox; the component already handles native submission.
- Do not use Checkbox where only one option may be selected.
- Do not remove focus styles or omit a label.
