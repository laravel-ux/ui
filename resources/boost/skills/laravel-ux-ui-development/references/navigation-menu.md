# Navigation Menu

Use `x-ux::navigation-menu` for primary website navigation with direct links and click-open panels.

```blade
<x-ux::navigation-menu>
    <x-ux::navigation-menu.list>
        <x-ux::navigation-menu.item>
            <x-ux::navigation-menu.trigger>Components</x-ux::navigation-menu.trigger>
            <x-ux::navigation-menu.content>
                <x-ux::navigation-menu.link href="/docs">Documentation</x-ux::navigation-menu.link>
            </x-ux::navigation-menu.content>
        </x-ux::navigation-menu.item>
    </x-ux::navigation-menu.list>
</x-ux::navigation-menu>
```

- Triggers open only on click; do not add hover-open behavior.
- Opening one trigger closes another open item in the same menu.
- Escape closes the panel and restores focus to its trigger; Arrow Down opens it and focuses its first link.
- Match the shadcn RTL demo structure: Getting Started with three links, a responsive Components panel with six links, and a direct Docs link. Use Arabic copy, `dir="rtl"`, and logical spacing utilities.
- Do not add a separate Link preview section; keep direct links within the main composition example.
- `x-ux::navigation-menu.content` accepts `side`, `side-offset`, and `align`.
- `x-ux::navigation-menu.link` accepts `active` and renders an anchor when `href` is present.
