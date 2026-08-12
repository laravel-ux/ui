# Input

Use `x-ux::input` for single-line form data. Compose it with x-ux::field for labels, descriptions, disabled state, and validation state.

## Example

```blade
<x-ux::field>
    <x-ux::field.label for="email">Email</x-ux::field.label>
    <x-ux::input id="email" type="email" wire:model="email" />
    <x-ux::field.description>We'll send updates to this address.</x-ux::field.description>
    <x-ux::field.error :errors="$errors->get('email')" />
</x-ux::field>
```

## Livewire

```blade
<x-ux::input wire:model.live.debounce.300ms="query" type="search" placeholder="Search..." />
```

## Rules

- Use x-ux::field.label with a matching `for` and input `id`.
- Put `disabled` on x-ux::input and `data-disabled` on the containing x-ux::field.
- Put `aria-invalid="true"` on x-ux::input and `data-invalid="true"` on the containing x-ux::field.
- Use x-ux::input-group for icons, text, or buttons inside the control.
- Use native input attributes such as `type`, `required`, `autocomplete`, and `placeholder`; x-ux::input has no custom props.
