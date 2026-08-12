# Message Scroller

A chat scroll container that anchors turns, follows streamed responses, preserves loaded history, and jumps to messages.

```blade preview
<div x-data="{ sent: false }" class="flex h-[480px] w-full max-w-xl flex-col overflow-hidden rounded-xl border bg-background">
    <div class="flex h-12 shrink-0 items-center border-b px-4 font-medium">New Chat</div>
    <div class="min-h-0 flex-1">
        <x-ux::message-scroller.provider auto-scroll>
            <x-ux::message-scroller>
                <x-ux::message-scroller.viewport>
                    <x-ux::message-scroller.content class="px-4 py-6">
                        <x-ux::message-scroller.item message-id="demo-welcome" class="flex flex-col items-center gap-1 py-6 text-center">
                            <p class="font-medium">How can I help you today?</p>
                        </x-ux::message-scroller.item>
                        <x-ux::message-scroller.item message-id="demo-user" scroll-anchor>
                            <x-ux::message align="end">
                                <x-ux::message.content><x-ux::bubble><x-ux::bubble.content>Morning, Laravel!</x-ux::bubble.content></x-ux::bubble></x-ux::message.content>
                            </x-ux::message>
                        </x-ux::message-scroller.item>
                        <x-ux::message-scroller.item message-id="demo-assistant">
                            <x-ux::message>
                                <x-ux::message.content><x-ux::bubble variant="secondary"><x-ux::bubble.content>What are we working on today?</x-ux::bubble.content></x-ux::bubble></x-ux::message.content>
                            </x-ux::message>
                        </x-ux::message-scroller.item>
                        <x-ux::message-scroller.item message-id="demo-prompt">
                            <x-ux::marker variant="separator"><x-ux::marker.content>Press send to start a new conversation</x-ux::marker.content></x-ux::marker>
                        </x-ux::message-scroller.item>
                        <template x-if="sent">
                            <x-ux::message-scroller.item message-id="demo-new-user" scroll-anchor>
                                <x-ux::message align="end"><x-ux::message.content><x-ux::bubble><x-ux::bubble.content>I'm building a Laravel chat and the streamed reply keeps moving the thread.</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message>
                            </x-ux::message-scroller.item>
                        </template>
                    </x-ux::message-scroller.content>
                </x-ux::message-scroller.viewport>
                <x-ux::message-scroller.button />
            </x-ux::message-scroller>
        </x-ux::message-scroller.provider>
    </div>
    <div class="shrink-0 border-t p-3">
        <x-ux::input-group>
            <x-ux::input-group.input value="I'm building a chat for our Laravel app and the scroll behavior is driving me nuts." readonly />
            <x-ux::input-group.addon align="inline-end">
                <x-ux::input-group.button variant="default" x-on:click="sent = true">Send</x-ux::input-group.button>
            </x-ux::input-group.addon>
        </x-ux::input-group>
        <p class="mt-2 text-center text-xs text-muted-foreground">Demo is read only. Press send to send messages.</p>
    </div>
</div>
```

## Usage

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
                        <x-ux::message :align="$message['role'] === 'user' ? 'end' : 'start'">
                            {{-- Message content --}}
                        </x-ux::message>
                    </x-ux::message-scroller.item>
                @endforeach
            </x-ux::message-scroller.content>
        </x-ux::message-scroller.viewport>
        <x-ux::message-scroller.button />
    </x-ux::message-scroller>
</x-ux::message-scroller.provider>
```

Place `x-ux::message-scroller` inside a height-constrained container.

## Composition

```text
x-ux::message-scroller.provider
└── x-ux::message-scroller
    ├── x-ux::message-scroller.viewport
    │   └── x-ux::message-scroller.content
    │       └── x-ux::message-scroller.item
    └── x-ux::message-scroller.button
```

## Core Concepts

### Anchoring Turns

Set `scroll-anchor` on the row that starts a meaningful turn. In an AI conversation, this is usually the user message.

```blade preview
<div x-data="{ role: 'user', sent: false }" class="flex h-[440px] w-full max-w-xl flex-col overflow-hidden rounded-xl border bg-background">
    <div class="border-b p-4">
        <p class="font-medium">Anchoring Turns</p>
        <p class="text-sm text-muted-foreground">Choose which role settles near the top edge.</p>
    </div>
    <div class="min-h-0 flex-1">
        <x-ux::message-scroller.provider :scroll-previous-item-peek="48">
            <x-ux::message-scroller>
                <x-ux::message-scroller.viewport>
                    <x-ux::message-scroller.content>
                        <div x-show="! sent" class="m-auto flex flex-col items-center gap-1 text-center">
                            <p class="font-medium">No anchored messages yet</p>
                            <p class="text-sm text-muted-foreground">Send the first message to see the selected role anchor.</p>
                        </div>
                        <template x-if="sent">
                            <div class="contents">
                                <x-ux::message-scroller.item message-id="anchor-user" x-bind:data-scroll-anchor="String(role === 'user')">
                                    <x-ux::message align="end"><x-ux::message.content><x-ux::bubble><x-ux::bubble.content>How should this new turn be positioned?</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message>
                                </x-ux::message-scroller.item>
                                <x-ux::message-scroller.item message-id="anchor-assistant" x-bind:data-scroll-anchor="String(role === 'assistant')">
                                    <x-ux::message><x-ux::message.content><x-ux::bubble variant="secondary"><x-ux::bubble.content>The selected row is kept near the top while the response grows below it.</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message>
                                </x-ux::message-scroller.item>
                            </div>
                        </template>
                    </x-ux::message-scroller.content>
                </x-ux::message-scroller.viewport>
                <x-ux::message-scroller.button />
            </x-ux::message-scroller>
        </x-ux::message-scroller.provider>
    </div>
    <div class="flex items-center justify-between gap-3 border-t p-3">
        <x-ux::toggle-group x-model="role" type="single" variant="outline">
            <x-ux::toggle-group.item value="user">User</x-ux::toggle-group.item>
            <x-ux::toggle-group.item value="assistant">Assistant</x-ux::toggle-group.item>
        </x-ux::toggle-group>
        <x-ux::button x-on:click="sent = true">Send Message</x-ux::button>
    </div>
    <p class="border-t px-4 py-2 text-xs text-muted-foreground">Toggle the anchor role, then send messages to compare where turns settle.</p>
</div>
```

### Group Chat

Any row can start a turn, including a marker.

```blade preview
<div x-data="{ joined: false }" class="flex h-[440px] w-full max-w-xl flex-col overflow-hidden rounded-xl border bg-background">
    <div class="border-b p-4">
        <p class="font-medium">Group Chat</p>
        <p class="text-sm text-muted-foreground">A group chat with several participants and an assistant. The Marker is marked as a turn.</p>
    </div>
    <div class="min-h-0 flex-1">
        <x-ux::message-scroller.provider default-scroll-position="end">
            <x-ux::message-scroller>
                <x-ux::message-scroller.viewport>
                    <x-ux::message-scroller.content>
                    <x-ux::message-scroller.item message-id="question">
                        <x-ux::message align="end"><x-ux::message.content><x-ux::bubble><x-ux::bubble.content>@taylor, can you check the queue configuration?</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message>
                    </x-ux::message-scroller.item>
                    <x-ux::message-scroller.item message-id="answer">
                        <x-ux::message><x-ux::message.content><x-ux::message.header>Taylor (Agent)</x-ux::message.header><x-ux::bubble variant="secondary"><x-ux::bubble.content>Confirmed. Notifications should use the dedicated queue and a retry backoff.</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message>
                    </x-ux::message-scroller.item>
                    <template x-if="joined">
                        <x-ux::message-scroller.item message-id="rocky-joined" scroll-anchor><x-ux::marker variant="separator"><x-ux::marker.content>Rocky joined the chat</x-ux::marker.content></x-ux::marker></x-ux::message-scroller.item>
                    </template>
                    </x-ux::message-scroller.content>
                </x-ux::message-scroller.viewport>
                <x-ux::message-scroller.button />
            </x-ux::message-scroller>
        </x-ux::message-scroller.provider>
    </div>
    <div class="flex items-center justify-between border-t p-3">
        <span class="text-sm text-muted-foreground">This will create a marker and make it the anchor</span>
        <x-ux::button x-on:click="joined = true">Add Rocky</x-ux::button>
    </div>
    <p class="border-t px-4 py-2 text-xs text-muted-foreground">When a user joins, scroll-anchor on the marker marks it as the next turn.</p>
</div>
```

### Keeping Context Visible

Use `scroll-previous-item-peek` to keep part of the previous row visible above a new anchor.

```blade preview
<div x-data="{ peek: [64], sent: false }" class="flex h-[460px] w-full max-w-xl flex-col overflow-hidden rounded-xl border bg-background">
    <div class="border-b p-4"><p class="font-medium">Keeping Context Visible</p><p class="text-sm text-muted-foreground">New turns keep part of the previous reply in view.</p></div>
    <div class="min-h-0 flex-1">
        <x-ux::message-scroller.provider :scroll-previous-item-peek="64" x-bind:data-scroll-previous-item-peek="peek[0]">
            <x-ux::message-scroller>
                <x-ux::message-scroller.viewport>
                    <x-ux::message-scroller.content>
                        <x-ux::message-scroller.item message-id="context-question" scroll-anchor><x-ux::message align="end"><x-ux::message.content><x-ux::bubble><x-ux::bubble.content>Why does streamed output keep moving the thread?</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message></x-ux::message-scroller.item>
                        <x-ux::message-scroller.item message-id="context-answer"><x-ux::message><x-ux::message.content><x-ux::bubble variant="secondary"><x-ux::bubble.content>Auto-scroll follows only while the reader stays at the live edge. Scrolling upward releases it.</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message></x-ux::message-scroller.item>
                        <template x-if="sent"><x-ux::message-scroller.item message-id="context-next" scroll-anchor><x-ux::message align="end"><x-ux::message.content><x-ux::bubble><x-ux::bubble.content>How do I keep the previous answer visible?</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message></x-ux::message-scroller.item></template>
                    </x-ux::message-scroller.content>
                </x-ux::message-scroller.viewport>
                <x-ux::message-scroller.button />
            </x-ux::message-scroller>
        </x-ux::message-scroller.provider>
    </div>
    <div class="flex items-center gap-4 border-t p-3"><x-ux::slider x-model="peek" :default-value="[64]" :min="0" :max="120" :step="8" aria-label="Previous item peek" /><span class="w-12 text-sm"><span x-text="peek[0]"></span> px</span><x-ux::button x-on:click="sent = true">Send</x-ux::button></div>
    <p class="border-t px-4 py-2 text-xs text-muted-foreground">Adjust the slider and send. Observe the previous message peek.</p>
</div>
```

### Following the Live Edge

`auto-scroll` follows growing content only while the reader remains at the end. Scrolling up releases it; returning with `x-ux::message-scroller.button` enables it again.

```blade preview
<div x-data="{ streaming: false }" class="flex h-[440px] w-full max-w-xl flex-col overflow-hidden rounded-xl border bg-background">
    <div class="border-b p-4"><p class="font-medium">Streaming Messages</p><p class="text-sm text-muted-foreground">Auto-scroll follows the live edge of the conversation.</p></div>
    <div class="min-h-0 flex-1">
        <x-ux::message-scroller.provider auto-scroll>
            <x-ux::message-scroller>
                <x-ux::message-scroller.viewport>
                    <x-ux::message-scroller.content x-bind:aria-busy="streaming">
                        <div x-show="! streaming" class="m-auto text-center"><p class="font-medium">Ready to Stream</p><p class="text-sm text-muted-foreground">Press send to stream a scripted Laravel summary.</p></div>
                        <template x-if="streaming"><x-ux::message-scroller.item message-id="stream-user" scroll-anchor><x-ux::message align="end"><x-ux::message.content><x-ux::bubble><x-ux::bubble.content>Summarize the deployment status.</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message></x-ux::message-scroller.item></template>
                        <template x-if="streaming"><x-ux::message-scroller.item message-id="stream-answer"><x-ux::message><x-ux::message.content><x-ux::bubble variant="secondary"><x-ux::bubble.content>The Laravel application deployed successfully. Queue workers restarted and health checks are passing.</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message></x-ux::message-scroller.item></template>
                    </x-ux::message-scroller.content>
                </x-ux::message-scroller.viewport>
                <x-ux::message-scroller.button />
            </x-ux::message-scroller>
        </x-ux::message-scroller.provider>
    </div>
    <div class="flex justify-end border-t p-3"><x-ux::button x-on:click="streaming = true">Send</x-ux::button></div>
    <p class="border-t px-4 py-2 text-xs text-muted-foreground">Streaming is simulated. Auto-scroll is enabled.</p>
</div>
```

### Opening Saved Threads

```blade preview
<div x-data="{ position: 'last-anchor' }" class="flex h-[460px] w-full max-w-xl flex-col overflow-hidden rounded-xl border bg-background">
    <div class="border-b p-4"><p class="font-medium">Opening Position</p><p class="text-sm text-muted-foreground">Choose where a saved transcript opens.</p></div>
    <div class="min-h-0 flex-1">
        <x-ux::message-scroller.provider id="opening-scroller" default-scroll-position="last-anchor">
            <x-ux::message-scroller>
                <x-ux::message-scroller.viewport><x-ux::message-scroller.content>
                    @foreach([
                        ['open-1', true, 'end', 'This is the first message the user sent in the conversation.'],
                        ['open-2', false, 'start', 'Workspace creation rose 8%, but first invite completion only rose 2%.'],
                        ['open-3', true, 'end', 'This is the last message the user sent in the conversation.'],
                        ['open-4', false, 'start', 'Start with the invite step. Teams are creating workspaces but waiting to add collaborators.'],
                        ['open-5', false, 'start', 'If that pattern holds, make collaboration useful earlier instead of prompting harder.'],
                    ] as [$id, $anchor, $align, $text])
                        <x-ux::message-scroller.item :message-id="$id" :scroll-anchor="$anchor"><x-ux::message :$align><x-ux::message.content><x-ux::bubble :variant="$align === 'end' ? 'default' : 'secondary'"><x-ux::bubble.content>{{ $text }}</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message></x-ux::message-scroller.item>
                    @endforeach
                </x-ux::message-scroller.content></x-ux::message-scroller.viewport>
                <x-ux::message-scroller.button />
            </x-ux::message-scroller>
        </x-ux::message-scroller.provider>
    </div>
    <div class="flex justify-center gap-2 border-t p-3">
        <x-ux::button variant="outline" x-on:click="$dispatch('message-scroller:scroll-to-start', { provider: 'opening-scroller' })">start</x-ux::button>
        <x-ux::button variant="outline" x-on:click="$dispatch('message-scroller:scroll-to-end', { provider: 'opening-scroller' })">end</x-ux::button>
        <x-ux::button variant="outline" x-on:click="$dispatch('message-scroller:scroll-to-message', { provider: 'opening-scroller', messageId: 'open-3' })">last-anchor</x-ux::button>
    </div>
</div>
```

### Loading Earlier Messages

The viewport preserves the first visible row when Livewire prepends older items. Keep stable `message-id` and `wire:key` values.

```blade preview
<div x-data="{ loaded: false }" class="flex h-[440px] w-full max-w-xl flex-col overflow-hidden rounded-xl border bg-background">
    <div class="border-b p-4"><p class="font-medium">Loading Earlier Messages</p><p class="text-sm text-muted-foreground">Older rows appear without moving the message currently in view.</p></div>
    <div class="min-h-0 flex-1">
        <x-ux::message-scroller.provider default-scroll-position="end">
            <x-ux::message-scroller>
                <x-ux::message-scroller.viewport preserve-scroll-on-prepend>
                    <x-ux::message-scroller.content>
                        <template x-if="loaded"><x-ux::message-scroller.item message-id="history-1"><x-ux::message align="end"><x-ux::message.content><x-ux::bubble><x-ux::bubble.content>Can you review the failed notification jobs?</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message></x-ux::message-scroller.item></template>
                        <template x-if="loaded"><x-ux::message-scroller.item message-id="history-2"><x-ux::message><x-ux::message.content><x-ux::bubble variant="secondary"><x-ux::bubble.content>Yes. The oldest failures came from a temporary mail provider timeout.</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message></x-ux::message-scroller.item></template>
                        @foreach(range(3, 7) as $index)
                            <x-ux::message-scroller.item message-id="history-{{ $index }}">
                                <x-ux::message :align="$index % 2 ? 'end' : 'start'"><x-ux::message.content><x-ux::bubble :variant="$index % 2 ? 'default' : 'secondary'"><x-ux::bubble.content>Queue review checkpoint {{ $index }}</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message>
                            </x-ux::message-scroller.item>
                        @endforeach
                    </x-ux::message-scroller.content>
                </x-ux::message-scroller.viewport>
                <x-ux::message-scroller.button />
            </x-ux::message-scroller>
        </x-ux::message-scroller.provider>
    </div>
    <div class="flex items-center justify-between border-t p-3"><span class="text-sm text-muted-foreground" x-text="loaded ? 'Earlier messages loaded' : 'More history is available' "></span><x-ux::button variant="outline" x-on:click="loaded = true" x-bind:disabled="loaded">Load Earlier</x-ux::button></div>
</div>
```

### Animating New Messages

Animate opacity or transform on new rows, without animating height, margin, or padding.

```blade preview
<div x-data="{ sent: false, animation: 'fade' }" class="flex h-[420px] w-full max-w-xl flex-col overflow-hidden rounded-xl border bg-background">
    <div class="border-b p-4"><p class="font-medium">Animation</p><p class="text-sm text-muted-foreground">Choose how user messages are animated when they are added.</p></div>
    <div class="min-h-0 flex-1">
        <x-ux::message-scroller.provider>
            <x-ux::message-scroller><x-ux::message-scroller.viewport><x-ux::message-scroller.content>
                <div x-show="! sent" class="m-auto text-center"><p class="font-medium">No Messages Yet</p><p class="text-sm text-muted-foreground">Click the button below to send the first message.</p></div>
                <template x-if="sent"><x-ux::message-scroller.item x-transition.opacity message-id="animated-message" scroll-anchor><x-ux::message align="end"><x-ux::message.content><x-ux::bubble><x-ux::bubble.content>Run the Laravel test suite before deployment.</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message></x-ux::message-scroller.item></template>
            </x-ux::message-scroller.content></x-ux::message-scroller.viewport><x-ux::message-scroller.button /></x-ux::message-scroller>
        </x-ux::message-scroller.provider>
    </div>
    <div class="flex justify-end border-t p-3"><x-ux::button x-on:click="sent = true">Send Message</x-ux::button></div>
    <p class="border-t px-4 py-2 text-xs text-muted-foreground">Select an animation then click send to see it in action.</p>
</div>
```

### Jumping to Messages

Dispatch commands from any control inside or outside the frame. Add the provider `id` when more than one scroller exists on a page.

```blade preview
<div x-data class="flex h-[460px] w-full max-w-xl flex-col overflow-hidden rounded-xl border bg-background">
    <div class="border-b p-4"><p class="font-medium">Commands</p><p class="text-sm text-muted-foreground">Drive the transcript from outside.</p></div>
    <div class="flex items-center gap-2 border-b p-3">
        <span class="text-sm font-medium">Jump to...</span>
        <x-ux::button
            size="sm"
            variant="outline"
            x-on:click="$dispatch('message-scroller:scroll-to-message', { provider: 'commands-scroller', messageId: 'command-2', align: 'center', behavior: 'smooth' })"
        >
            Message 2
        </x-ux::button>
        <x-ux::button
            size="sm"
            variant="outline"
            x-on:click="$dispatch('message-scroller:scroll-to-end', { provider: 'commands-scroller', behavior: 'smooth' })"
        >
            Scroll to end
        </x-ux::button>
    </div>
    <div class="min-h-0 flex-1">
        <x-ux::message-scroller.provider id="commands-scroller">
            <x-ux::message-scroller>
                <x-ux::message-scroller.viewport>
                    <x-ux::message-scroller.content>
                        @foreach(range(1, 6) as $index)
                            <x-ux::message-scroller.item message-id="command-{{ $index }}">
                                <x-ux::message :align="$index % 2 ? 'end' : 'start'">
                                    <x-ux::message.content>
                                        <x-ux::bubble :variant="$index % 2 ? 'default' : 'secondary'"><x-ux::bubble.content>Conversation message {{ $index }}</x-ux::bubble.content></x-ux::bubble>
                                    </x-ux::message.content>
                                </x-ux::message>
                            </x-ux::message-scroller.item>
                        @endforeach
                    </x-ux::message-scroller.content>
                </x-ux::message-scroller.viewport>
                <x-ux::message-scroller.button />
            </x-ux::message-scroller>
        </x-ux::message-scroller.provider>
    </div>
    <p class="border-t px-4 py-2 text-xs text-muted-foreground">Use the controls to jump to any message in the conversation.</p>
</div>
```

### Tracking the Reader's Position

Listen for `message-scroller:visibility-change` to update an outline or unread marker.

```blade preview
<div
    x-data="{ current: null, visible: [] }"
    x-on:message-scroller:visibility-change="current = $event.detail.currentAnchorId; visible = $event.detail.visibleMessageIds"
    class="flex h-[460px] w-full max-w-xl overflow-hidden rounded-xl border bg-background"
>
    <div class="w-40 shrink-0 border-e p-3">
        <p class="mb-2 text-sm font-medium">Transcript Outline</p>
        <div class="space-y-1 text-xs text-muted-foreground">
            <p :class="current === 'outline-1' && 'text-foreground font-medium'">Summary</p>
            <p :class="current === 'outline-3' && 'text-foreground font-medium'">Impact</p>
            <p :class="current === 'outline-5' && 'text-foreground font-medium'">Actions</p>
        </div>
    </div>
    <div class="min-w-0 flex-1">
        <x-ux::message-scroller.provider default-scroll-position="start">
            <x-ux::message-scroller><x-ux::message-scroller.viewport><x-ux::message-scroller.content>
                @foreach([
                    ['outline-1', true, 'Review the incident handoff and tell me what to read first.'],
                    ['outline-2', false, 'Start with the summary and the impact section.'],
                    ['outline-3', true, 'What was the customer impact?'],
                    ['outline-4', false, 'Impact was limited to delayed processing. No records were dropped.'],
                    ['outline-5', true, 'What actions are open?'],
                    ['outline-6', false, 'Keep the retry window enabled until the next deploy, then add a queue-depth alert.'],
                ] as [$id, $anchor, $text])
                    <x-ux::message-scroller.item :message-id="$id" :scroll-anchor="$anchor"><x-ux::message :align="$anchor ? 'end' : 'start'"><x-ux::message.content><x-ux::bubble :variant="$anchor ? 'default' : 'secondary'"><x-ux::bubble.content>{{ $text }}</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message></x-ux::message-scroller.item>
                @endforeach
            </x-ux::message-scroller.content></x-ux::message-scroller.viewport><x-ux::message-scroller.button /></x-ux::message-scroller>
        </x-ux::message-scroller.provider>
    </div>
</div>
```

### Reading Scroll State

The provider dispatches `message-scroller:scrollable-change` and mirrors the same state in `data-scrollable`.

```blade preview
<div x-data="{ start: false, end: false }" x-on:message-scroller:scrollable-change="start = $event.detail.start; end = $event.detail.end" class="flex h-[440px] w-full max-w-xl flex-col overflow-hidden rounded-xl border bg-background">
    <div class="border-b p-4"><p class="font-medium">Scroll Status</p><p class="text-sm text-muted-foreground">Where the reader can go based on the current scroll position.</p></div>
    <div class="min-h-0 flex-1">
        <x-ux::message-scroller.provider default-scroll-position="start">
            <x-ux::message-scroller><x-ux::message-scroller.viewport><x-ux::message-scroller.content>
                @foreach(range(1, 12) as $index)
                    <x-ux::message-scroller.item message-id="status-{{ $index }}"><x-ux::message :align="$index % 2 ? 'end' : 'start'"><x-ux::message.content><x-ux::bubble :variant="$index % 2 ? 'default' : 'secondary'"><x-ux::bubble.content>Review scroll checkpoint {{ $index }}.</x-ux::bubble.content></x-ux::bubble></x-ux::message.content></x-ux::message></x-ux::message-scroller.item>
                @endforeach
            </x-ux::message-scroller.content></x-ux::message-scroller.viewport><x-ux::message-scroller.button /></x-ux::message-scroller>
        </x-ux::message-scroller.provider>
    </div>
    <p class="border-t px-4 py-2 text-sm" x-text="!start && !end ? 'All messages fit in the viewport.' : start && end ? 'Scroll up or down.' : start ? 'At the latest message. Scroll up.' : 'At the first message. Scroll down.'"></p>
</div>
```

## API Reference

### x-ux::message-scroller.provider

| Prop | Type | Default |
| --- | --- | --- |
| `auto-scroll` | `boolean` | `false` |
| `default-scroll-position` | `enum` [?"start" \| "end" \| "last-anchor"] | `"end"` |
| `scroll-edge-threshold` | `number` | `8` |
| `scroll-margin` | `number` | `0` |
| `scroll-previous-item-peek` | `number` | `64` |

### x-ux::message-scroller.viewport

| Prop | Type | Default |
| --- | --- | --- |
| `preserve-scroll-on-prepend` | `boolean` | `true` |

### x-ux::message-scroller.item

| Prop | Type | Default |
| --- | --- | --- |
| `message-id` | `string` | `null` |
| `scroll-anchor` | `boolean` | `false` |

### x-ux::message-scroller.button

| Prop | Type | Default |
| --- | --- | --- |
| `behavior` | `enum` [?"auto" \| "smooth" \| "instant"] | `"smooth"` |
| `direction` | `enum` [?"start" \| "end"] | `"end"` |

## Publishing

```shell
php artisan vendor:publish --tag=ux-message-scroller --force
```
