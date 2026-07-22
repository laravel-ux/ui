# Bubble

Displays conversational content in a message bubble. Supports variants, alignment, grouping, reactions, and collapsible content.

```blade preview
<div class="flex w-full max-w-sm flex-col gap-8 py-12">
    <x-ux::bubble align="end"><x-ux::bubble.content>Hey there! what's up?</x-ux::bubble.content></x-ux::bubble>
    <x-ux::bubble.group>
        <x-ux::bubble variant="muted"><x-ux::bubble.content>Hey! Want to see chat bubbles?</x-ux::bubble.content></x-ux::bubble>
        <x-ux::bubble variant="muted">
            <x-ux::bubble.content>I can group messages, switch sides, and keep the whole thread easy to scan.</x-ux::bubble.content>
            <x-ux::bubble.reactions role="img" aria-label="Reaction: thumbs up"><span>👍</span></x-ux::bubble.reactions>
        </x-ux::bubble>
    </x-ux::bubble.group>
    <x-ux::bubble align="end"><x-ux::bubble.content>Sure. Hit me with your best demo.</x-ux::bubble.content></x-ux::bubble>
    <x-ux::bubble variant="muted">
        <x-ux::bubble.content>Yes. You are reading a demo that is demoing itself. Very meta. Very on-brand.</x-ux::bubble.content>
        <x-ux::bubble.reactions role="img" aria-label="Reactions: thumbs up, fire, eyes, and 2 more"><span>👍</span><span>🔥</span><span>👀</span><span>+2</span></x-ux::bubble.reactions>
    </x-ux::bubble>
</div>
```

The `x-ux::bubble` component displays framed conversational content. Use it for chat text, short structured output, quoted replies, suggestions, and reactions.

For full-featured chat interfaces, use the Message component. `x-ux::bubble` is intentionally scoped to the bubble surface. Place avatars, names, timestamps, metadata, and message-level actions in Message.

## Usage

```blade
<x-ux::bubble>
    <x-ux::bubble.content>
        I checked the registry output and removed the stale route.
    </x-ux::bubble.content>
    <x-ux::bubble.reactions role="img" aria-label="Reaction: thumbs up">
        <span>👍</span>
    </x-ux::bubble.reactions>
</x-ux::bubble>
```

## Composition

```text
x-ux::bubble
├── x-ux::bubble.content
└── x-ux::bubble.reactions
```

```text
x-ux::bubble.group
├── x-ux::bubble
│   └── x-ux::bubble.content
└── x-ux::bubble
    └── x-ux::bubble.content
```

## Features

- Seven visual variants, from a strong primary bubble to unframed ghost content
- Start and end alignment for sender and receiver bubbles
- Reactions that anchor to the bubble edge with configurable side and alignment
- Bubbles size to their content, up to 80% of the container width
- Polymorphic content via `as-child` for link and button bubbles
- Customizable styling through the `class` attribute on every part

## Variants

Use `variant` to change the visual treatment of the bubble.

```blade preview
<div class="flex w-full max-w-sm flex-col gap-12 py-12">
    <x-ux::bubble><x-ux::bubble.content>This is the default primary bubble.</x-ux::bubble.content></x-ux::bubble>
    <x-ux::bubble variant="secondary" align="end"><x-ux::bubble.content>This is the secondary variant.</x-ux::bubble.content></x-ux::bubble>
    <x-ux::bubble variant="muted">
        <x-ux::bubble.content>This one is muted. It uses a lower emphasis color for the chat bubble.</x-ux::bubble.content>
        <x-ux::bubble.reactions role="img" aria-label="Reaction: thumbs up"><span>👍</span></x-ux::bubble.reactions>
    </x-ux::bubble>
    <x-ux::bubble variant="tinted" align="end"><x-ux::bubble.content>This one is tinted. The tint is a softer color derived from the primary color.</x-ux::bubble.content></x-ux::bubble>
    <x-ux::bubble variant="outline"><x-ux::bubble.content>We can also use an outlined variant.</x-ux::bubble.content></x-ux::bubble>
    <x-ux::bubble variant="destructive" align="end">
        <x-ux::bubble.content>Or a destructive variant with a reaction.</x-ux::bubble.content>
        <x-ux::bubble.reactions role="img" aria-label="Reaction: fire"><span>🔥</span></x-ux::bubble.reactions>
    </x-ux::bubble>
    <x-ux::bubble variant="ghost">
        <x-ux::bubble.content class="space-y-4">
            <p>Ghost bubbles work for assistant text, <strong>markdown</strong>, and other content that should not be framed.</p>
            <p>This is perfect for assistant messages that should not have a frame and can take the full width of the container. You can also render <code>code</code> in it.</p>
            <p>Ghost bubbles are full width and can take the full width of the container.</p>
        </x-ux::bubble.content>
    </x-ux::bubble>
</div>
```

| Variant       | Description                                            |
|---------------|--------------------------------------------------------|
| `default`     | A strong primary bubble, usually for the current user. |
| `secondary`   | The standard neutral bubble for conversation content.  |
| `muted`       | A lower-emphasis bubble for quiet supporting content.  |
| `tinted`      | A subtle primary-tinted bubble.                        |
| `outline`     | A bordered bubble for secondary or rich content.       |
| `ghost`       | Unframed content for assistant text or rich content.   |
| `destructive` | A destructive bubble for error or failed actions.      |

A bubble sizes to its content, up to 80% of the container width. The `ghost` variant removes the max-width so assistant text and rich content can span the full row.

## Alignment

Use `align` on `x-ux::bubble` to align the bubble to the start or end of the conversation.

```blade preview
<div class="flex w-full max-w-sm flex-col gap-8 py-12">
    <x-ux::bubble variant="muted"><x-ux::bubble.content>This bubble is aligned to the start. This is the default alignment.</x-ux::bubble.content></x-ux::bubble>
    <x-ux::bubble align="end"><x-ux::bubble.content>This bubble is aligned to the end. Use this for user messages.</x-ux::bubble.content></x-ux::bubble>
</div>
```

| align   | Description                                        |
|---------|----------------------------------------------------|
| `start` | Align the bubble to the start of the conversation. |
| `end`   | Align the bubble to the end of the conversation.   |

When building chat interfaces, you probably want to use alignment on the Message component itself, not the Bubble component.

## Bubble Group

Use `x-ux::bubble.group` to group consecutive bubbles from the same sender. The `align` prop should be set on `x-ux::bubble` itself, not on `x-ux::bubble.group`.

```blade preview
<div class="flex w-full max-w-sm flex-col gap-8 py-12">
    <x-ux::bubble variant="muted"><x-ux::bubble.content>Can you tell me what's the issue?</x-ux::bubble.content></x-ux::bubble>
    <x-ux::bubble.group>
        <x-ux::bubble align="end"><x-ux::bubble.content>You tell me!</x-ux::bubble.content></x-ux::bubble>
        <x-ux::bubble align="end"><x-ux::bubble.content>It worked yesterday. You broke it!</x-ux::bubble.content></x-ux::bubble>
        <x-ux::bubble align="end">
            <x-ux::bubble.content>Find the bug and fix it.</x-ux::bubble.content>
            <x-ux::bubble.reactions role="img" aria-label="Reactions: eyes" align="start"><span>👀</span></x-ux::bubble.reactions>
        </x-ux::bubble>
    </x-ux::bubble.group>
    <x-ux::bubble variant="muted"><x-ux::bubble.content>Want me to diff yesterday's you against today's you? It's a bit embarrassing.</x-ux::bubble.content></x-ux::bubble>
</div>
```

## Links and Buttons

You can turn a bubble into a link or button by using `as-child` on `x-ux::bubble.content`.

```blade preview
<div class="flex w-full max-w-sm flex-col gap-8 py-12">
    <x-ux::bubble variant="muted"><x-ux::bubble.content>How can I help you today?</x-ux::bubble.content></x-ux::bubble>
    <x-ux::bubble.group>
        <x-ux::bubble variant="tinted" align="end"><x-ux::bubble.content as-child><button type="button">I forgot my password</button></x-ux::bubble.content></x-ux::bubble>
        <x-ux::bubble variant="tinted" align="end"><x-ux::bubble.content as-child><button type="button">I need help with my subscription</button></x-ux::bubble.content></x-ux::bubble>
        <x-ux::bubble variant="tinted" align="end"><x-ux::bubble.content as-child><button type="button">Something else. Talk to a human.</button></x-ux::bubble.content></x-ux::bubble>
    </x-ux::bubble.group>
</div>
```

```blade
<x-ux::bubble variant="muted">
    <x-ux::bubble.content as-child>
        <button type="button">Click here</button>
    </x-ux::bubble.content>
</x-ux::bubble>
```

## Reactions

Use `x-ux::bubble.reactions` for bubble reactions. Use `side` and `align` to position the row. Reactions overlap the bubble edge, so leave vertical space between rows.

```blade preview
<div class="flex w-full max-w-sm flex-col gap-12 py-12">
    <x-ux::bubble variant="muted" align="end">
        <x-ux::bubble.content>I don't need tests, I know my code works.</x-ux::bubble.content>
        <x-ux::bubble.reactions align="start" role="img" aria-label="Reactions: thumbs up, surprised"><span>👍</span><span>😮</span></x-ux::bubble.reactions>
    </x-ux::bubble>
    <x-ux::bubble variant="muted">
        <x-ux::bubble.content>Bold. Fine I'll add some tests. I'll let you know when they're done.</x-ux::bubble.content>
        <x-ux::bubble.reactions role="img" aria-label="Reactions: eyes, rocket, and 2 more"><span>👀</span><span>🚀</span><span>+2</span></x-ux::bubble.reactions>
    </x-ux::bubble>
    <x-ux::bubble align="end">
        <x-ux::bubble.content>Tests passed on the first try. All 142 of them. Looking good!</x-ux::bubble.content>
        <x-ux::bubble.reactions side="top" align="start" role="img" aria-label="Reactions: party popper, clapping hands"><span>🎉</span><span>👏</span></x-ux::bubble.reactions>
    </x-ux::bubble>
    <x-ux::bubble variant="destructive">
        <x-ux::bubble.content>Are you sure I can run this command?</x-ux::bubble.content>
        <x-ux::bubble.reactions><x-ux::button variant="ghost" size="xs">Yes, run it</x-ux::button></x-ux::bubble.reactions>
    </x-ux::bubble>
</div>
```

## Show More / Collapsible

Long bubble content can be composed with `x-ux::collapsible` to allow for a show more or show less interaction.

```blade preview
<div x-data="{ open: false }" class="flex w-full max-w-sm flex-col gap-8 py-12">
    <x-ux::bubble variant="muted"><x-ux::bubble.content>How can I help you today?</x-ux::bubble.content></x-ux::bubble>
    <x-ux::bubble variant="muted" align="end">
        <x-ux::bubble.content class="whitespace-pre-line">
            <x-ux::collapsible x-model="open">
                <div x-show="! open">The accessibility review found two focus states that were visually too subtle in dark mode. I checked the dialog, menu, and drawer paths because each one renders focusable control...</div>
                <x-ux::collapsible.content>
                    The accessibility review found two focus states that were visually too subtle in dark mode.

                    I checked the dialog, menu, and drawer paths because each one renders focusable controls inside a layered surface.

                    The dialog and drawer are fine. The menu needs the hover and focus tokens split so keyboard focus stays visible when the pointer is not involved.

                    I also recommend keeping the change in the style file instead of the primitive so the other themes can choose their own focus treatment later.
                </x-ux::collapsible.content>
                <x-ux::collapsible.trigger as-child>
                    <x-ux::button variant="link" class="group gap-1 p-0 text-muted-foreground">
                        <span x-text="open ? 'Show less' : 'Show more'"></span>
                        <x-ux::icon name="chevron-down" data-icon="inline-end" class="group-data-panel-open/button:rotate-180" />
                    </x-ux::button>
                </x-ux::collapsible.trigger>
            </x-ux::collapsible>
        </x-ux::bubble.content>
    </x-ux::bubble>
</div>
```

## Tooltip

Wrap a bubble in `x-ux::tooltip` to reveal metadata on hover, such as when a message was read.

```blade preview
<div class="flex w-full max-w-sm flex-col gap-4 py-12">
    <x-ux::bubble variant="secondary"><x-ux::bubble.content>Did you remove the stale route?</x-ux::bubble.content></x-ux::bubble>
    <x-ux::bubble align="end">
        <x-ux::bubble.content>Yes, removed it from the registry.</x-ux::bubble.content>
        <x-ux::bubble.reactions>
            <x-ux::tooltip>
                <x-ux::tooltip.trigger as-child><x-ux::button variant="ghost" size="icon-xs"><x-ux::icon name="check" /></x-ux::button></x-ux::tooltip.trigger>
                <x-ux::tooltip.content>Read on Jan 5, 2026 at 4:32 PM</x-ux::tooltip.content>
            </x-ux::tooltip>
        </x-ux::bubble.reactions>
    </x-ux::bubble>
</div>
```

## Popover

Pair a bubble with `x-ux::popover` to surface more information on demand, such as the full error message for a failed action.

```blade preview
<div class="flex w-full max-w-sm flex-col gap-4 py-12">
    <x-ux::bubble align="end"><x-ux::bubble.content>Run the build script.</x-ux::bubble.content></x-ux::bubble>
    <x-ux::bubble variant="destructive">
        <x-ux::bubble.content>Failed to run the command.</x-ux::bubble.content>
        <x-ux::bubble.reactions>
            <x-ux::popover>
                <x-ux::popover.trigger as-child><x-ux::button variant="ghost" size="icon-xs" aria-label="Show error details" class="aria-expanded:text-destructive"><x-ux::icon name="info" /></x-ux::button></x-ux::popover.trigger>
                <x-ux::popover.content>
                    <div class="space-y-2">
                        <h4 class="text-sm font-medium">Command failed with exit code 1</h4>
                        <p class="text-sm text-muted-foreground">ENOENT: no such file or directory, open pnpm-lock.yaml</p>
                    </div>
                </x-ux::popover.content>
            </x-ux::popover>
        </x-ux::bubble.reactions>
    </x-ux::bubble>
</div>
```

## Accessibility

`x-ux::bubble` renders the presentational message surface. Keep conversation-level semantics on the surrounding container.

### Labeling Reactions

Group non-interactive emoji as a single image with a descriptive `aria-label`.

```blade
<x-ux::bubble.reactions role="img" aria-label="Reactions: thumbs up, fire, and 8 more">
    <span>👍</span><span>🔥</span><span>+8</span>
</x-ux::bubble.reactions>
```

When reactions are interactive, render buttons and give icon-only buttons an `aria-label`.

```blade
<x-ux::bubble.reactions>
    <x-ux::button aria-label="Thumbs up" variant="secondary" size="icon-xs"><x-ux::icon name="thumbs-up" /></x-ux::button>
</x-ux::bubble.reactions>
```

### Interactive Bubbles

Render clickable content as a real `<button>` or `<a>` with `as-child`.

```blade
<x-ux::bubble variant="muted" align="end">
    <x-ux::bubble.content as-child>
        <button type="button" wire:click="reply">I forgot my password</button>
    </x-ux::bubble.content>
</x-ux::bubble>
```

### Meaning Beyond Color

Pair variants with text, alignment, or icons so meaning is not conveyed by color alone. Keep error context in the message text for a destructive bubble.

## API Reference

### `x-ux::bubble`

| Prop      | Type                                                                                                       | Default     |
|-----------|------------------------------------------------------------------------------------------------------------|-------------|
| `variant` | `enum` [?"default" \| "secondary" \| "muted" \| "tinted" \| "outline" \| "ghost" \| "destructive"] | `"default"` |
| `align`   | `enum` [?"start" \| "end"]                                                                              | `"start"`   |

### `x-ux::bubble.content`

| Prop       | Type      | Default |
|------------|-----------|---------|
| `as-child` | `boolean` | `false` |

### `x-ux::bubble.reactions`

| Prop    | Type                              | Default    |
|---------|-----------------------------------|------------|
| `side`  | `enum` [?"top" \| "bottom"]   | `"bottom"` |
| `align` | `enum` [?"start" \| "end"]    | `"end"`    |

## Publishing

```shell
php artisan vendor:publish --tag=ux-bubble --force
```
