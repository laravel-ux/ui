# Label

Use `x-ux::label` to associate text with a simple standalone control. Use `x-ux::field.label` when the control is part of a form field with description or validation content.

## Examples

```blade
<div class="flex items-center gap-2">
    <x-ux::checkbox id="terms" />
    <x-ux::label for="terms">Accept terms and conditions</x-ux::label>
</div>
```

```blade
<x-ux::field.set>
    <x-ux::field.legend>Payment Method</x-ux::field.legend>
    <x-ux::field.group>
        <x-ux::field>
            <x-ux::field.label for="card-name">Name on Card</x-ux::field.label>
            <x-ux::input id="card-name" />
        </x-ux::field>
    </x-ux::field.group>
</x-ux::field.set>
```

## Rules

- Match the label `for` value to the control `id`.
- Use `x-ux::field.label` instead of `x-ux::label` in structured form fields.
- Keep required markers and short badges inside the label when needed.
- Put disabled state on the control; peer and group state automatically reduce label opacity.
- Do not use a label as a visual-only heading or attach it to a non-form element.
