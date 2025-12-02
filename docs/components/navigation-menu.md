# Navigation Menu

A collection of links for navigating websites.

```blade preview
<x-ux::navigation-menu>
    <x-ux::navigation-menu.list>
        <x-ux::navigation-menu.item>
            <x-ux::navigation-menu.trigger>Home</x-ux::navigation-menu.trigger>
            <x-ux::navigation-menu.content>
                <ul class="grid gap-2 md:w-[400px] lg:w-[500px] lg:grid-cols-[.75fr_1fr]">
                    <li class="row-span-3">
                        <x-ux::navigation-menu.link
                            href="#"
                            class="from-muted/50 to-muted flex h-full w-full flex-col justify-end 
                            rounded-md bg-linear-to-b p-6 no-underline outline-hidden select-none focus:shadow-md"
                        >
                            <div class="mt-4 mb-2 text-lg font-medium">
                                shadcn/ui
                            </div>
                            <p class="text-muted-foreground text-sm leading-tight">
                                Beautifully designed components built with Tailwind CSS.
                            </p>
                        </x-ux::navigation-menu.link>
                    </li>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Introduction
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            Re-usable components built using Radix UI and Tailwind CSS.
                        </p>
                    </x-ux::navigation-menu.link>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Installation
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            How to install dependencies and structure your app.
                        </p>
                    </x-ux::navigation-menu.link>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Typography
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            Styles for headings, paragraphs, lists...etc
                        </p>
                    </x-ux::navigation-menu.link>
                </ul>
            </x-ux::navigation-menu.content>
        </x-ux::navigation-menu.item>
        <x-ux::navigation-menu.item>
            <x-ux::navigation-menu.trigger>Components</x-ux::navigation-menu.trigger>
            <x-ux::navigation-menu.content>
                <ul class="grid w-[400px] gap-2 md:w-[500px] md:grid-cols-2 lg:w-[600px]">
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Alert Dialog
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            A modal dialog that interrupts the user with important content and expects a response.
                        </p>
                    </x-ux::navigation-menu.link>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Hover Card
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            For sighted users to preview content available behind a link.
                        </p>
                    </x-ux::navigation-menu.link>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Progress
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            Displays an indicator showing the completion progress of a task, typically displayed as a progress bar.
                        </p>
                    </x-ux::navigation-menu.link>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Scroll-area
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            Visually or semantically separates content.
                        </p>
                    </x-ux::navigation-menu.link>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Tabs
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            A set of layered sections of content—known as tab panels—that are displayed one at a time.
                        </p>
                    </x-ux::navigation-menu.link>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Tooltip
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            A popup that displays information related to an element when the element receives keyboard focus or the mouse hovers over it.
                        </p>
                    </x-ux::navigation-menu.link>
                </ul>
            </x-ux::navigation-menu.content>
        </x-ux::navigation-menu.item>
        <x-ux::navigation-menu.item>
            <x-ux::navigation-menu.link href="#">
                Documentation
            </x-ux::navigation-menu.link.link>
        </x-ux::navigation-menu.item>
    </x-ux::navigation-menu.list>
</x-ux::navigation-menu>
```

## Usage

```blade
<x-ux::navigation-menu>
    <x-ux::navigation-menu.list>
        <x-ux::navigation-menu.item>
            <x-ux::navigation-menu.trigger>Item One</x-ux::navigation-menu.trigger>
            <x-ux::navigation-menu.content>
                <x-ux::navigation-menu.link>Link</x-ux::navigation-menu.link>
            </x-ux::navigation-menu.content>
        </x-ux::navigation-menu.item>
    </x-ux::navigation-menu.list>
</x-ux::navigation-menu>
```

## API Reference

### x-ux::navigation-menu.content

Contains the content associated with each trigger.

| Prop                                                                    | Type                                             | Default    |
|-------------------------------------------------------------------------|--------------------------------------------------|------------|
| `side` [?The preferred side of the trigger to render against when open] | `enum` [?"top" \| "right" \| "bottom" \| "left"] | `"bottom"` |
| `side-offset` [?The distance in pixels from the trigger]                | `number`                                         | `4`        |
| `align` [?The preferred alignment against the trigger]                  | `enum` [?"start" \| "center" \| "end"]           | `"start"`  |


### x-ux::navigation-menu.link

A navigational link.

| Prop                                                                | Type      | Default |
|---------------------------------------------------------------------|-----------|---------|
| `active` [?Used to identify the link as the currently active page.] | `boolean` | `false` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-navigation-menu --force
```
