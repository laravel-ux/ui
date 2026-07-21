# Dialog

Use Dialog for modal tasks or information that requires the user's attention while the rest of the page is unavailable.

## Composition

```text
x-ux::dialog
├── x-ux::dialog.trigger
└── x-ux::dialog.content
    ├── x-ux::dialog.header
    │   ├── x-ux::dialog.title
    │   └── x-ux::dialog.description
    ├── Content
    ├── x-ux::dialog.footer
    └── x-ux::dialog.close
```

Keep all parts inside one root. Content is portaled to `body`; do not add custom fixed-position wrappers or overlays.

## API

### `x-ux::dialog`

| Prop   | Type      | Default | Purpose                    |
|--------|-----------|---------|----------------------------|
| `open` | `boolean` | `false` | Set the initial open state.|

### `x-ux::dialog.trigger`

| Prop       | Type      | Default | Purpose                                   |
|------------|-----------|---------|-------------------------------------------|
| `as-child` | `boolean` | `false` | Merge trigger behavior into its one child.|

### `x-ux::dialog.content`

| Prop                | Type      | Default | Purpose                              |
|---------------------|-----------|---------|--------------------------------------|
| `show-close-button` | `boolean` | `true`  | Render the top-corner close control. |

### `x-ux::dialog.footer`

| Prop                | Type      | Default | Purpose                                |
|---------------------|-----------|---------|----------------------------------------|
| `show-close-button` | `boolean` | `false` | Append a standard outline Close button.|

### `x-ux::dialog.close`

| Prop       | Type      | Default | Purpose                                 |
|------------|-----------|---------|-----------------------------------------|
| `as-child` | `boolean` | `false` | Merge close behavior into its one child.|

Header, Title, Description, and Overlay have no custom props. Every part accepts standard HTML attributes and Tailwind classes.

## Basic Dialog

```blade
<x-ux::dialog>
    <x-ux::dialog.trigger as-child>
        <x-ux::button variant="outline">Edit profile</x-ux::button>
    </x-ux::dialog.trigger>
    <x-ux::dialog.content>
        <x-ux::dialog.header>
            <x-ux::dialog.title>Edit profile</x-ux::dialog.title>
            <x-ux::dialog.description>
                Make changes to your profile here. Click save when you're done.
            </x-ux::dialog.description>
        </x-ux::dialog.header>
        {{-- fields --}}
        <x-ux::dialog.footer>
            <x-ux::dialog.close variant="outline">Cancel</x-ux::dialog.close>
            <x-ux::button type="submit">Save changes</x-ux::button>
        </x-ux::dialog.footer>
    </x-ux::dialog.content>
</x-ux::dialog>
```

Use `as-child` when Trigger or Close contains another interactive component. This produces one button instead of nested interactive elements.

## State

Open the dialog initially with `<x-ux::dialog open>`. For client-owned state, bind the root with `x-model`. Use `wire:model` only when the server must know whether the dialog is open, and back it with a boolean property.

The component manages focus, Escape, focus restoration, outside click, ARIA relationships, and document scroll locking. Do not reproduce those behaviors in application code.

## Content and Actions

- Always include a concise Title. Add a Description when the title alone does not explain the task.
- Put primary task controls in Footer, with the primary action last in source order.
- Use `:show-close-button="false"` only when another clearly labelled Close control is present or the workflow intentionally cannot be dismissed.
- Use `x-ux::dialog.close` for Cancel, Done, or custom close controls. A normal Button does not close the dialog automatically.
- For long content, constrain and scroll the body area rather than the entire Content panel: `-mx-4 no-scrollbar max-h-[50vh] overflow-y-auto px-4`.

## Accessibility and RTL

- Trigger renders a native `type="button"` by default and receives `aria-haspopup`, `aria-expanded`, and `aria-controls`.
- Content receives `role="dialog"`, `aria-modal`, and automatic Title and Description references.
- Focus moves into the dialog when it opens, stays inside while using Tab, and returns to the trigger after close.
- Provide visible text or an `aria-label` for every custom icon-only Close control.
- Set `dir="rtl"` on the root or an ancestor. Dialog layout and form content inherit direction automatically.

## Avoid

- Do not nest a Button inside Trigger or Close without `as-child`.
- Do not add `x-show`, custom Escape listeners, focus traps, overlays, or body scroll locking.
- Do not omit Title merely to achieve a visual design; hide it with `sr-only` when necessary.
- Do not use Dialog for non-modal disclosure; use Collapsible, Popover, or Sheet as appropriate.
- Do not place a second form inside a form solely because it appears in a dialog; teleporting changes visual placement, not application intent.
