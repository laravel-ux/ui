# Bubble

Use Bubble for the visible surface of conversational content: chat text, short structured output, quoted replies,
suggestions, and reactions. Keep avatars, sender names, timestamps, delivery state, and message-level actions in the
surrounding Message layout.

## Composition

```text
x-ux::bubble
├── x-ux::bubble.content
└── x-ux::bubble.reactions

x-ux::bubble.group
└── x-ux::bubble
    └── x-ux::bubble.content
```

## API

### `x-ux::bubble`

| Prop      | Values                                                                       | Default   | Purpose                                      |
|-----------|------------------------------------------------------------------------------|-----------|----------------------------------------------|
| `variant` | `default`, `secondary`, `muted`, `tinted`, `outline`, `ghost`, `destructive` | `default` | Set visual emphasis and tone.                |
| `align`   | `start`, `end`                                                               | `start`   | Align the bubble on the logical inline axis. |

### `x-ux::bubble.content`

| Prop       | Type    | Default | Purpose                                              |
|------------|---------|---------|------------------------------------------------------|
| `as-child` | boolean | `false` | Merge content styling into one link or button child. |

### `x-ux::bubble.reactions`

| Prop    | Values          | Default  | Purpose                                      |
|---------|-----------------|----------|----------------------------------------------|
| `side`  | `top`, `bottom` | `bottom` | Anchor reactions to the upper or lower edge. |
| `align` | `start`, `end`  | `end`    | Align reactions on the logical inline axis.  |

Group has no custom props. Every part accepts standard HTML attributes and Tailwind classes.

## Conversation Pattern

```blade
<div class="flex flex-col gap-8">
    <x-ux::bubble variant="muted">
        <x-ux::bubble.content>How can I help you today?</x-ux::bubble.content>
    </x-ux::bubble>

    <x-ux::bubble align="end">
        <x-ux::bubble.content>I need help with my subscription.</x-ux::bubble.content>
    </x-ux::bubble>
</div>
```

Use `align="end"` for the current user's content and `align="start"` for the other participant only when Bubble owns
alignment. When a Message component already owns row alignment, let Message control it.

## Variant Selection

- Use `default` for a strong primary/current-user bubble.
- Use `secondary` for standard neutral conversation content.
- Use `muted` for lower-emphasis supporting content.
- Use `tinted` for subtle primary emphasis or suggestion buttons.
- Use `outline` for bordered or rich content.
- Use `ghost` for unframed assistant text, Markdown, or rich content that may span the row.
- Use `destructive` only for errors or failed actions, and keep the error reason in the text.

## Grouped Messages

```blade
<x-ux::bubble.group>
    @foreach($messages as $message)
        <x-ux::bubble align="end" wire:key="message-{{ $message->id }}">
            <x-ux::bubble.content>{{ $message->body }}</x-ux::bubble.content>
        </x-ux::bubble>
    @endforeach
</x-ux::bubble.group>
```

Set `align` on each Bubble, not Group. Group only controls spacing between consecutive surfaces from the same sender.

## Links and Buttons

Use `as-child` to preserve one semantic interactive element.

```blade
<x-ux::bubble variant="tinted" align="end">
    <x-ux::bubble.content as-child>
        <button type="button" wire:click="choose('forgot-password')">
            I forgot my password
        </button>
    </x-ux::bubble.content>
</x-ux::bubble>
```

Do not put a button or link inside the default Content `<div>` and then style both elements independently.

## Reactions

For display-only emoji, announce the entire row once:

```blade
<x-ux::bubble.reactions role="img" aria-label="Reactions: thumbs up, fire, and 2 more">
    <span>👍</span><span>🔥</span><span>+2</span>
</x-ux::bubble.reactions>
```

For interactive reactions, use labeled buttons instead of `role="img"`:

```blade
<x-ux::bubble.reactions>
    <x-ux::button variant="ghost" size="icon-xs" wire:click="react('thumbs-up')" aria-label="React with thumbs up">
        <x-ux::icon name="thumbs-up" />
    </x-ux::button>
</x-ux::bubble.reactions>
```

Reactions overlap the bubble edge. Leave additional vertical spacing between neighboring rows. Use logical `align`
values; they mirror automatically in RTL.

## Related Components

- Put long expandable content inside `x-ux::collapsible` within Content.
- Wrap metadata controls with `x-ux::tooltip` when hover and keyboard focus should reveal details.
- Use `x-ux::popover` for interactive or multi-line supplementary details.
- Keep Alpine or Livewire state in the composed interactive component; Bubble itself requires no JavaScript state.

## Accessibility

- Keep conversation semantics such as lists, articles, sender identity, and live-region behavior on the surrounding
  container.
- Use real links and buttons through `as-child`; do not use click handlers on a plain `<div>`.
- Give every icon-only reaction button an `aria-label`.
- Do not rely on variant color alone to communicate sender, status, or failure.
- Avoid making an entire long assistant response clickable.
