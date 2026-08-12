# Message

Use `x-ux::message` to lay out a conversation row and `x-ux::bubble` for its visible message surface.

## Composition

```blade
<x-ux::message>
    <x-ux::message.avatar>
        <x-ux::avatar><x-ux::avatar.fallback>L</x-ux::avatar.fallback></x-ux::avatar>
    </x-ux::message.avatar>
    <x-ux::message.content>
        <x-ux::message.header>Laravel</x-ux::message.header>
        <x-ux::bubble variant="secondary">
            <x-ux::bubble.content>How can I help you today?</x-ux::bubble.content>
        </x-ux::bubble>
        <x-ux::message.footer>Delivered</x-ux::message.footer>
    </x-ux::message.content>
</x-ux::message>
```

## Rules

- Use `align="end"` for the current sender and the default `start` alignment for the other participant.
- Use `x-ux::message.group` for consecutive messages from the same sender.
- Render an empty `x-ux::message.avatar` on earlier grouped rows to preserve alignment.
- Put sender metadata in `x-ux::message.header` and delivery status or actions in `x-ux::message.footer`.
- Keep delivery failures in `x-ux::message.footer`; do not replace the original message bubble with an error bubble.
- Put file actions such as download inside `x-ux::attachment.actions` when an attachment is rendered in a message.
- Give icon-only footer actions an `aria-label`.
- For accessible live progress inside a message, compose `x-ux::marker` with `role="status"`; this is guidance, not a separate message variant.
