# Drawer

A drawer component for Blade.

```blade preview
<div
    x-data="{ open: false, isMobile: window.innerWidth < 768 }"
    x-on:resize.window.debounce.100ms="isMobile = window.innerWidth < 768"
>
<x-ux::drawer
    x-model="open"
    x-bind:data-show-swipe-handle="isMobile"
    x-bind:data-swipe-direction="isMobile ? 'down' : 'right'"
>
    <x-ux::drawer.trigger as-child>
        <x-ux::button variant="secondary">Open Drawer</x-ux::button>
    </x-ux::drawer.trigger>
    <x-ux::drawer.content>
        <x-ux::drawer.header>
            <x-ux::drawer.title>Pick a delivery time</x-ux::drawer.title>
            <x-ux::drawer.description>
                We'll prepare your order as soon as possible.
            </x-ux::drawer.description>
        </x-ux::drawer.header>
        <div class="scroll-fade flex-1 overflow-y-auto p-4">
            <x-ux::radio-group value="asap" class="gap-2">
                @foreach([
                    ['asap', 'Standard delivery', '25–35 min · Driver assigned now', 'Fastest'],
                    ['5-00', '5:00 PM – 5:15 PM', 'Prep starts at 4:45 PM'],
                    ['5-30', '5:30 PM – 5:45 PM', "Good if you're heading home"],
                    ['6-00', '6:00 PM – 6:15 PM', 'Most popular · High demand'],
                    ['6-30', '6:30 PM – 6:45 PM', 'Last slot before kitchen closes'],
                ] as $time)
                    @php([$value, $label, $description, $badge] = array_pad($time, 4, null))
                    <x-ux::field.label for="drawer-delivery-{{ $value }}">
                        <x-ux::field orientation="horizontal">
                            <x-ux::field.content>
                                <x-ux::field.title class="flex items-center gap-2">
                                    {{ $label }}
                                    @if($badge)
                                        <x-ux::badge variant="secondary">{{ $badge }}</x-ux::badge>
                                    @endif
                                </x-ux::field.title>
                                <x-ux::field.description>{{ $description }}</x-ux::field.description>
                            </x-ux::field.content>
                            <x-ux::radio-group.item id="drawer-delivery-{{ $value }}" value="{{ $value }}" />
                        </x-ux::field>
                    </x-ux::field.label>
                @endforeach
            </x-ux::radio-group>
        </div>
        <x-ux::drawer.footer>
            <x-ux::button class="h-[34px]" x-on:click="open = false">Confirm Delivery Time</x-ux::button>
            <x-ux::drawer.close as-child>
                <x-ux::button variant="outline">Cancel</x-ux::button>
            </x-ux::drawer.close>
        </x-ux::drawer.footer>
    </x-ux::drawer.content>
</x-ux::drawer>
</div>
```

## Usage

```blade
<x-ux::drawer>
    <x-ux::drawer.trigger as-child>
        <x-ux::button variant="outline">Open</x-ux::button>
    </x-ux::drawer.trigger>
    <x-ux::drawer.content>
        <x-ux::drawer.header>
            <x-ux::drawer.title>Are you absolutely sure?</x-ux::drawer.title>
            <x-ux::drawer.description>This action cannot be undone.</x-ux::drawer.description>
        </x-ux::drawer.header>
        <div class="p-4">Content here</div>
        <x-ux::drawer.footer>
            <x-ux::button>Submit</x-ux::button>
            <x-ux::drawer.close as-child>
                <x-ux::button variant="outline">Cancel</x-ux::button>
            </x-ux::drawer.close>
        </x-ux::drawer.footer>
    </x-ux::drawer.content>
</x-ux::drawer>
```

## Composition

```text
x-ux::drawer
├── x-ux::drawer.trigger
└── x-ux::drawer.content
    ├── x-ux::drawer.swipe-handle
    ├── x-ux::drawer.header
    │   ├── x-ux::drawer.title
    │   └── x-ux::drawer.description
    └── x-ux::drawer.footer
```

`x-ux::drawer.content` composes the portal, overlay, viewport, and popup. `x-ux::drawer.overlay` and `x-ux::drawer.swipe-handle` are also available for styling.

## Custom Sizes

A vertical drawer sizes itself to its content and is capped at `calc(100dvh - 6rem)` by default. A side drawer spans `75%` of the viewport width, or `24rem` on larger screens.

To customize the height of a vertical drawer, use the `h-*` and `max-h-*` utilities on `x-ux::drawer.content`.

```blade
<x-ux::drawer.content class="h-[50vh]">
```

To make a region of the drawer scrollable, make the scroll container a flex item. Avoid `h-full`, which does not resolve inside a content-sized drawer.

## Position

Use the `swipe-direction` prop to set the side of the drawer. Available options are `up`, `right`, `down`, and `left`.

```blade preview
<x-ux::drawer swipe-direction="left">
    <x-ux::drawer.trigger as-child>
        <x-ux::button variant="secondary">Open Left Drawer</x-ux::button>
    </x-ux::drawer.trigger>
    <x-ux::drawer.content>
        <x-ux::drawer.header>
            <x-ux::drawer.title>Move Goal</x-ux::drawer.title>
            <x-ux::drawer.description>Set your daily activity goal.</x-ux::drawer.description>
        </x-ux::drawer.header>
        <div class="flex-1 p-4">
            <div class="size-full rounded-2xl bg-muted"></div>
        </div>
        <x-ux::drawer.footer>
            <x-ux::drawer.close>Close</x-ux::drawer.close>
        </x-ux::drawer.footer>
    </x-ux::drawer.content>
</x-ux::drawer>
```

## Swipe Handle

Use `show-swipe-handle` on `x-ux::drawer` to render a swipe handle.

```blade preview
<x-ux::drawer show-swipe-handle>
    <x-ux::drawer.trigger as-child>
        <x-ux::button variant="secondary">Open Drawer</x-ux::button>
    </x-ux::drawer.trigger>
    <x-ux::drawer.content>
        <x-ux::drawer.header>
            <x-ux::drawer.title>Drawer</x-ux::drawer.title>
            <x-ux::drawer.description>Drawer with a swipe handle.</x-ux::drawer.description>
        </x-ux::drawer.header>
        <div class="flex-1 p-4">
            <div class="rounded-2xl bg-muted group-data-[swipe-axis=x]/drawer-popup:size-full group-data-[swipe-axis=y]/drawer-popup:h-80 group-data-[swipe-axis=y]/drawer-popup:w-full"></div>
        </div>
        <x-ux::drawer.footer>
            <x-ux::drawer.close>Close</x-ux::drawer.close>
        </x-ux::drawer.footer>
    </x-ux::drawer.content>
</x-ux::drawer>
```

## Nested

Open drawers from inside another drawer. Parent drawers stay mounted behind the frontmost drawer.

```blade preview
<div
    x-data="{ isMobile: window.innerWidth < 768 }"
    x-on:resize.window.debounce.100ms="isMobile = window.innerWidth < 768"
>
<x-ux::drawer
    x-bind:data-show-swipe-handle="isMobile"
    x-bind:data-swipe-direction="isMobile ? 'down' : 'right'"
>
    <x-ux::drawer.trigger as-child>
        <x-ux::button variant="secondary">Open Drawer</x-ux::button>
    </x-ux::drawer.trigger>
    <x-ux::drawer.content>
        <x-ux::drawer.header>
            <x-ux::drawer.title>Drawer</x-ux::drawer.title>
            <x-ux::drawer.description>Open another drawer from the same direction.</x-ux::drawer.description>
        </x-ux::drawer.header>
        <div class="flex-1 p-4">
            <div class="bg-muted group-data-[swipe-axis=x]/drawer-popup:size-full group-data-[swipe-axis=y]/drawer-popup:aspect-video group-data-[swipe-axis=y]/drawer-popup:w-full"></div>
        </div>
        <x-ux::drawer.footer>
            <x-ux::drawer
                x-bind:data-show-swipe-handle="isMobile"
                x-bind:data-swipe-direction="isMobile ? 'down' : 'right'"
            >
                <x-ux::drawer.trigger as-child>
                    <x-ux::button variant="outline">Open Nested Drawer</x-ux::button>
                </x-ux::drawer.trigger>
                <x-ux::drawer.content>
                    <x-ux::drawer.header>
                        <x-ux::drawer.title>Nested Drawer</x-ux::drawer.title>
                        <x-ux::drawer.description>The parent drawer stays mounted behind this one.</x-ux::drawer.description>
                    </x-ux::drawer.header>
                    <div class="flex-1 p-4">
                        <div class="bg-muted group-data-[swipe-axis=x]/drawer-popup:size-full group-data-[swipe-axis=y]/drawer-popup:aspect-video group-data-[swipe-axis=y]/drawer-popup:w-full"></div>
                    </div>
                    <x-ux::drawer.footer>
                        <x-ux::drawer
                            x-bind:data-show-swipe-handle="isMobile"
                            x-bind:data-swipe-direction="isMobile ? 'down' : 'right'"
                        >
                            <x-ux::drawer.trigger as-child>
                                <x-ux::button variant="outline">Open Third Drawer</x-ux::button>
                            </x-ux::drawer.trigger>
                            <x-ux::drawer.content>
                                <x-ux::drawer.header>
                                    <x-ux::drawer.title>Third Drawer</x-ux::drawer.title>
                                    <x-ux::drawer.description>Two drawers are stacked behind this one.</x-ux::drawer.description>
                                </x-ux::drawer.header>
                                <div class="flex-1 p-4">
                                    <div class="bg-muted group-data-[swipe-axis=x]/drawer-popup:size-full group-data-[swipe-axis=y]/drawer-popup:aspect-video group-data-[swipe-axis=y]/drawer-popup:w-full"></div>
                                </div>
                                <x-ux::drawer.footer>
                                    <x-ux::drawer
                                        x-bind:data-show-swipe-handle="isMobile"
                                        x-bind:data-swipe-direction="isMobile ? 'down' : 'right'"
                                    >
                                        <x-ux::drawer.trigger as-child>
                                            <x-ux::button variant="outline">Open Fourth Drawer</x-ux::button>
                                        </x-ux::drawer.trigger>
                                        <x-ux::drawer.content>
                                            <x-ux::drawer.header>
                                                <x-ux::drawer.title>Fourth Drawer</x-ux::drawer.title>
                                                <x-ux::drawer.description>This is the frontmost drawer in the stack.</x-ux::drawer.description>
                                            </x-ux::drawer.header>
                                            <div class="flex-1 p-4">
                                                <div class="bg-muted group-data-[swipe-axis=x]/drawer-popup:size-full group-data-[swipe-axis=y]/drawer-popup:aspect-video group-data-[swipe-axis=y]/drawer-popup:w-full"></div>
                                            </div>
                                            <x-ux::drawer.footer>
                                                <x-ux::drawer.close variant="outline">Close</x-ux::drawer.close>
                                            </x-ux::drawer.footer>
                                        </x-ux::drawer.content>
                                    </x-ux::drawer>
                                    <x-ux::drawer.close variant="outline">Close</x-ux::drawer.close>
                                </x-ux::drawer.footer>
                            </x-ux::drawer.content>
                        </x-ux::drawer>
                        <x-ux::drawer.close variant="outline">Close</x-ux::drawer.close>
                    </x-ux::drawer.footer>
                </x-ux::drawer.content>
            </x-ux::drawer>
            <x-ux::drawer.close variant="outline">Close</x-ux::drawer.close>
        </x-ux::drawer.footer>
    </x-ux::drawer.content>
</x-ux::drawer>
</div>
```

## Non Modal

Set `:modal="false"` to allow interaction with the rest of the page. Combine with `disable-pointer-dismissal` to prevent the drawer from closing on outside presses.

```blade preview
<x-ux::drawer :modal="false" disable-pointer-dismissal swipe-direction="right">
    <x-ux::drawer.trigger as-child>
        <x-ux::button variant="outline">Non Modal</x-ux::button>
    </x-ux::drawer.trigger>
    <x-ux::drawer.content>
        <x-ux::drawer.header>
            <x-ux::drawer.title>Non Modal Drawer</x-ux::drawer.title>
        </x-ux::drawer.header>
        <div class="flex-1 p-4">
            <div class="rounded-2xl bg-muted group-data-[swipe-axis=x]/drawer-popup:size-full group-data-[swipe-axis=y]/drawer-popup:h-80 group-data-[swipe-axis=y]/drawer-popup:w-full"></div>
        </div>
        <x-ux::drawer.footer>
            <x-ux::drawer.close>Close</x-ux::drawer.close>
        </x-ux::drawer.footer>
    </x-ux::drawer.content>
</x-ux::drawer>
```

## Snap Points

Use `snap-points` to snap a vertical drawer to preset heights. Numbers between `0` and `1` represent fractions of the viewport. Numbers greater than `1` are treated as pixel values. String values support `px`, `rem`, and `%` units.

```blade preview
<x-ux::drawer :snap-points="['31rem', 1]" show-swipe-handle>
    <x-ux::drawer.trigger as-child>
        <x-ux::button variant="outline">Open Snap Drawer</x-ux::button>
    </x-ux::drawer.trigger>
    <x-ux::drawer.content>
        <x-ux::drawer.header>
            <x-ux::drawer.title>Snap points</x-ux::drawer.title>
            <x-ux::drawer.description>
                Drag the drawer to snap between a compact peek and a near full-height view.
            </x-ux::drawer.description>
        </x-ux::drawer.header>
        <div class="flex-1 p-4">
            <div class="rounded-2xl bg-muted group-data-[swipe-axis=x]/drawer-popup:size-full group-data-[swipe-axis=y]/drawer-popup:h-80 group-data-[swipe-axis=y]/drawer-popup:w-full"></div>
        </div>
        <x-ux::drawer.footer>
            <x-ux::drawer.close>Close</x-ux::drawer.close>
        </x-ux::drawer.footer>
    </x-ux::drawer.content>
</x-ux::drawer>
```

## API Reference

### x-ux::drawer

| Prop                                                                                           | Type                                           | Default  |
|------------------------------------------------------------------------------------------------|------------------------------------------------|----------|
| `open` [?The initial open state.]                                                               | `boolean`                                      | `false`  |
| `modal` [?Controls modal behavior and focus trapping.]                                          | `enum`[?true \| false \| "trap-focus"]       | `true`   |
| `show-swipe-handle` [?Render the swipe handle.]                                                 | `boolean`                                      | `false`  |
| `snap-points` [?Heights at which a vertical drawer settles.]                                    | `array`                                        | `[]`     |
| `swipe-direction` [?The direction in which the drawer is dismissed.]                            | `enum`[?"up" \| "right" \| "down" \| "left"] | `"down"` |
| `disable-pointer-dismissal` [?Prevent dismissal when pressing outside the drawer.]              | `boolean`                                      | `false`  |

### x-ux::drawer.trigger

| Prop                                                   | Type      | Default |
|--------------------------------------------------------|-----------|---------|
| `as-child` [?Merge behavior into the single child.]    | `boolean` | `false` |

### x-ux::drawer.close

| Prop                                                   | Type      | Default |
|--------------------------------------------------------|-----------|---------|
| `as-child` [?Merge behavior into the single child.]    | `boolean` | `false` |

## Publishing

```shell
php artisan vendor:publish --tag=ux-drawer --force
```
