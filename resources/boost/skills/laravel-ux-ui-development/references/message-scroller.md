# Message Scroller

Use `x-ux::message-scroller` for a height-constrained conversation transcript that follows streaming output without fighting the reader's scroll position.

## Composition

```blade
<x-ux::message-scroller.provider auto-scroll>
    <x-ux::message-scroller>
        <x-ux::message-scroller.viewport>
            <x-ux::message-scroller.content :aria-busy="$streaming">
                @foreach($messages as $message)
                    <x-ux::message-scroller.item
                        :message-id="$message['id']"
                        :scroll-anchor="$message['role'] === 'user'"
                        wire:key="message-{{ $message['id'] }}"
                    >
                        <x-ux::message />
                    </x-ux::message-scroller.item>
                @endforeach
            </x-ux::message-scroller.content>
        </x-ux::message-scroller.viewport>
        <x-ux::message-scroller.button />
    </x-ux::message-scroller>
</x-ux::message-scroller.provider>
```

## Rules

- Constrain the height of the parent; `x-ux::message-scroller` fills the available space.
- Wrap every direct transcript row in `x-ux::message-scroller.item`.
- Use stable `message-id` and `wire:key` values so prepended history keeps its position.
- Mark the row that starts a meaningful turn with `scroll-anchor`.
- Enable `auto-scroll` for streamed output; it releases when the reader scrolls away.
- Add `x-ux::message-scroller.button` only when the interface needs an explicit jump control; it is optional.
- The jump button reacts to real transcript rows; anchor spacer space does not make it active by itself.
- Put `aria-busy="true"` on `x-ux::message-scroller.content` while a response streams.
- Use the `message-scroller:scroll-to-start`, `message-scroller:scroll-to-end`, and `message-scroller:scroll-to-message` events for external controls.
- Listen for `message-scroller:visibility-change` when an outline needs `currentAnchorId` or `visibleMessageIds`.
- Listen for `message-scroller:scrollable-change`, or style against `data-scrollable`, when controls depend on the current edges.
- Animate only opacity or transforms on inserted rows; avoid animating row height, margin, or padding.
- Do not add competing scroll watchers or force `scrollTop` from Livewire hooks.
