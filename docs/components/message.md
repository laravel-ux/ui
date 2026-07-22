# Message

Displays a message in a conversation, with optional avatar, header, footer, and alignment.

```blade preview
<div class="flex w-full max-w-lg flex-col gap-6">
    <x-ux::message align="end">
        <x-ux::message.avatar>
            <x-ux::avatar><x-ux::avatar.fallback>ME</x-ux::avatar.fallback></x-ux::avatar>
        </x-ux::message.avatar>
        <x-ux::message.content>
            <x-ux::bubble><x-ux::bubble.content>Deploying to prod real quick.</x-ux::bubble.content></x-ux::bubble>
        </x-ux::message.content>
    </x-ux::message>
    <x-ux::message>
        <x-ux::message.avatar>
            <x-ux::avatar><x-ux::avatar.fallback>L</x-ux::avatar.fallback></x-ux::avatar>
        </x-ux::message.avatar>
        <x-ux::message.content>
            <x-ux::bubble variant="secondary"><x-ux::bubble.content>It's 4:55 PM. On a Friday.</x-ux::bubble.content></x-ux::bubble>
        </x-ux::message.content>
    </x-ux::message>
    <x-ux::message align="end">
        <x-ux::message.avatar>
            <x-ux::avatar><x-ux::avatar.fallback>ME</x-ux::avatar.fallback></x-ux::avatar>
        </x-ux::message.avatar>
        <x-ux::message.content>
            <x-ux::bubble><x-ux::bubble.content>It's a one-line change.</x-ux::bubble.content></x-ux::bubble>
            <x-ux::message.footer>Delivered</x-ux::message.footer>
        </x-ux::message.content>
    </x-ux::message>
    <x-ux::message>
        <x-ux::message.avatar>
            <x-ux::avatar><x-ux::avatar.fallback>L</x-ux::avatar.fallback></x-ux::avatar>
        </x-ux::message.avatar>
        <x-ux::message.content>
            <x-ux::bubble variant="secondary"><x-ux::bubble.content>It's always a one-line change 😭.</x-ux::bubble.content></x-ux::bubble>
            <x-ux::bubble variant="secondary">
                <x-ux::bubble.content>Alright, let me take a look.</x-ux::bubble.content>
                <x-ux::bubble.reactions role="img" aria-label="Reaction: thumbs up"><span>👍</span></x-ux::bubble.reactions>
            </x-ux::bubble>
            <x-ux::marker role="status">
                <x-ux::marker.icon><x-ux::spinner /></x-ux::marker.icon>
                <x-ux::marker.content class="shimmer">Taylor is typing...</x-ux::marker.content>
            </x-ux::marker>
        </x-ux::message.content>
    </x-ux::message>
</div>
```

Use `x-ux::message` for the row layout and render the visible surface with `x-ux::bubble`.

## Usage

```blade
<x-ux::message>
    <x-ux::message.avatar>
        <x-ux::avatar>
            <x-ux::avatar.image src="https://laravel.com/img/logomark.min.svg" alt="Laravel" />
            <x-ux::avatar.fallback>L</x-ux::avatar.fallback>
        </x-ux::avatar>
    </x-ux::message.avatar>
    <x-ux::message.content>
        <x-ux::bubble>
            <x-ux::bubble.content>How can I help you today?</x-ux::bubble.content>
        </x-ux::bubble>
    </x-ux::message.content>
</x-ux::message>
```

## Composition

```text
x-ux::message
├── x-ux::message.avatar
└── x-ux::message.content
    ├── x-ux::message.header
    ├── x-ux::bubble
    └── x-ux::message.footer
```

```text
x-ux::message.group
├── x-ux::message
└── x-ux::message
```

## Avatar

```blade preview
<div class="flex w-full max-w-lg flex-col gap-6">
    <x-ux::message>
        <x-ux::message.avatar><x-ux::avatar><x-ux::avatar.fallback>L</x-ux::avatar.fallback></x-ux::avatar></x-ux::message.avatar>
        <x-ux::message.content><x-ux::bubble variant="secondary"><x-ux::bubble.content>The build failed during dependency installation.</x-ux::bubble.content></x-ux::bubble></x-ux::message.content>
    </x-ux::message>
    <x-ux::message align="end">
        <x-ux::message.avatar><x-ux::avatar><x-ux::avatar.fallback>L</x-ux::avatar.fallback></x-ux::avatar></x-ux::message.avatar>
        <x-ux::message.content><x-ux::bubble><x-ux::bubble.content>Can you share the exact error?</x-ux::bubble.content></x-ux::bubble></x-ux::message.content>
    </x-ux::message>
    <x-ux::message>
        <x-ux::message.avatar><x-ux::avatar><x-ux::avatar.fallback>L</x-ux::avatar.fallback></x-ux::avatar></x-ux::message.avatar>
        <x-ux::message.content>
            <x-ux::bubble variant="secondary"><x-ux::bubble.content>Here's the error from the logs</x-ux::bubble.content></x-ux::bubble>
            <x-ux::bubble variant="destructive"><x-ux::bubble.content>Something went wrong with the build. Try running it again.</x-ux::bubble.content></x-ux::bubble>
        </x-ux::message.content>
    </x-ux::message>
</div>
```

## Group

```blade preview
<x-ux::message.group class="max-w-lg">
    <x-ux::message>
        <x-ux::message.avatar />
        <x-ux::message.content>
            <x-ux::bubble variant="secondary"><x-ux::bubble.content>I checked the package configuration.</x-ux::bubble.content></x-ux::bubble>
        </x-ux::message.content>
    </x-ux::message>
    <x-ux::message>
        <x-ux::message.avatar>
            <x-ux::avatar><x-ux::avatar.fallback>L</x-ux::avatar.fallback></x-ux::avatar>
        </x-ux::message.avatar>
        <x-ux::message.content>
            <x-ux::bubble variant="secondary"><x-ux::bubble.content>The component and examples now live in the Laravel package.</x-ux::bubble.content></x-ux::bubble>
        </x-ux::message.content>
    </x-ux::message>
</x-ux::message.group>
```

## Header and Footer

```blade preview
<div class="flex w-full max-w-lg flex-col gap-6">
    <x-ux::message>
        <x-ux::message.content>
            <x-ux::message.header>Taylor</x-ux::message.header>
            <x-ux::bubble variant="secondary"><x-ux::bubble.content>I already checked the logs.</x-ux::bubble.content></x-ux::bubble>
        </x-ux::message.content>
    </x-ux::message>
    <x-ux::message align="end">
        <x-ux::message.content>
            <x-ux::bubble><x-ux::bubble.content>Send the report to the Laravel team.</x-ux::bubble.content></x-ux::bubble>
            <x-ux::message.footer>Read Yesterday</x-ux::message.footer>
        </x-ux::message.content>
    </x-ux::message>
</div>
```

## Actions

```blade preview
<div class="flex w-full max-w-lg flex-col gap-6">
    <x-ux::message>
        <x-ux::message.content>
            <x-ux::bubble variant="secondary"><x-ux::bubble.content>The install failure is coming from the workspace package.</x-ux::bubble.content></x-ux::bubble>
            <x-ux::message.footer>
                <x-ux::button variant="ghost" size="icon-xs" aria-label="Copy"><x-ux::icon name="copy" /></x-ux::button>
            </x-ux::message.footer>
        </x-ux::message.content>
    </x-ux::message>
    <x-ux::message align="end">
        <x-ux::message.content>
            <x-ux::bubble><x-ux::bubble.content>Okay drop me a link. Taking a look...</x-ux::bubble.content></x-ux::bubble>
            <x-ux::message.footer>
                <span class="text-destructive">Failed to send</span>
                <x-ux::button variant="ghost" size="icon-xs" aria-label="Retry"><x-ux::icon name="refresh-ccw" /></x-ux::button>
            </x-ux::message.footer>
        </x-ux::message.content>
    </x-ux::message>
</div>
```

## Attachment

```blade preview
<div class="flex w-full max-w-lg flex-col gap-6">
    <x-ux::message align="end">
        <x-ux::message.content>
            <x-ux::bubble>
                <x-ux::bubble.content class="p-0">
                    <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=900&auto=format&fit=crop&q=80" alt="Workspace" />
                </x-ux::bubble.content>
            </x-ux::bubble>
            <x-ux::bubble><x-ux::bubble.content>Here's the image. Can you add it to the PDF? Use it for the cover page.</x-ux::bubble.content></x-ux::bubble>
        </x-ux::message.content>
    </x-ux::message>
    <x-ux::message>
        <x-ux::message.content>
            <x-ux::bubble variant="secondary"><x-ux::bubble.content>Done. Here's the PDF with the image added as the cover page.</x-ux::bubble.content></x-ux::bubble>
            <x-ux::attachment>
                <x-ux::attachment.media><x-ux::icon name="file-text" /></x-ux::attachment.media>
                <x-ux::attachment.content><x-ux::attachment.title>sales-dashboard.pdf</x-ux::attachment.title><x-ux::attachment.description>PDF · 2.4 MB</x-ux::attachment.description></x-ux::attachment.content>
                <x-ux::attachment.actions>
                    <x-ux::attachment.action aria-label="Download sales-dashboard.pdf"><x-ux::icon name="download" /></x-ux::attachment.action>
                </x-ux::attachment.actions>
            </x-ux::attachment>
        </x-ux::message.content>
    </x-ux::message>
    <x-ux::message align="end">
        <x-ux::message.content>
            <x-ux::bubble><x-ux::bubble.content>Thanks. Looks good.</x-ux::bubble.content></x-ux::bubble>
        </x-ux::message.content>
    </x-ux::message>
</div>
```

## API Reference

### x-ux::message

| Prop | Type | Default |
| --- | --- | --- |
| `align` | `enum` [?"start" \| "end"] | `"start"` |

## Publishing

```shell
php artisan vendor:publish --tag=ux-message --force
```
