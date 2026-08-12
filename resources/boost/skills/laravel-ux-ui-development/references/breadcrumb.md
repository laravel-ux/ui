# Breadcrumb

Use Breadcrumb to show the current resource's position within a navigable hierarchy.

## Composition

```text
x-ux::breadcrumb
└── x-ux::breadcrumb.list
    ├── x-ux::breadcrumb.item
    │   └── x-ux::breadcrumb.link
    ├── x-ux::breadcrumb.separator
    └── x-ux::breadcrumb.item
        └── x-ux::breadcrumb.page
```

Ellipsis may replace one or more omitted items. A custom separator icon belongs inside Separator. The components have no
additional props; pass standard HTML attributes and Tailwind classes where needed.

## Basic Breadcrumb

```blade
<x-ux::breadcrumb>
    <x-ux::breadcrumb.list>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="{{ route('home') }}">Home</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator />
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="{{ route('projects.index') }}">Projects</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator />
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.page>{{ $project->name }}</x-ux::breadcrumb.page>
        </x-ux::breadcrumb.item>
    </x-ux::breadcrumb.list>
</x-ux::breadcrumb>
```

Use Link for navigable ancestors and Page exactly once for the current resource. Separator must be a sibling between
Items, not nested inside an Item.

## Collapsed Hierarchies

```blade
<x-ux::breadcrumb.item>
    <x-ux::breadcrumb.ellipsis />
</x-ux::breadcrumb.item>
```

Use Ellipsis when intermediate levels are intentionally omitted. If users must reach those levels, compose the Ellipsis
inside an accessible dropdown trigger:

```blade
<x-ux::breadcrumb.item>
    <x-ux::dropdown-menu>
        <x-ux::dropdown-menu.trigger aria-label="Open breadcrumb navigation">
            <x-ux::breadcrumb.ellipsis />
        </x-ux::dropdown-menu.trigger>
        <x-ux::dropdown-menu.content align="start">
            @foreach ($ancestors as $ancestor)
                <x-ux::dropdown-menu.item>
                    {{ $ancestor->name }}
                </x-ux::dropdown-menu.item>
            @endforeach
        </x-ux::dropdown-menu.content>
    </x-ux::dropdown-menu>
</x-ux::breadcrumb.item>
```

Make dropdown entries navigate according to the application's established dropdown-menu pattern.

## Custom Separator

```blade
<x-ux::breadcrumb.separator>
    <x-ux::icon name="slash" />
</x-ux::breadcrumb.separator>
```

The default chevron automatically reverses in RTL. A custom directional icon must handle RTL itself; neutral separators
such as Slash need no reversal.

## Navigation Integration

Pass navigation attributes directly to Link:

```blade
<x-ux::breadcrumb.link href="{{ route('dashboard') }}" wire:navigate>
    Dashboard
</x-ux::breadcrumb.link>
```

Do not replace Link with an arbitrary clickable `<span>`. Breadcrumb navigation should remain real anchor navigation.

## Accessibility and RTL

- Keep the root Breadcrumb around one List only.
- Render ancestors as Link and the current location as Page; do not link the current page to itself.
- Keep Separator and Ellipsis presentation-only. Their built-in semantics already hide decorative content from assistive
  technology.
- Shorten or collapse deep trails on narrow screens while keeping the current Page visible.
- Set `dir="rtl"` on Breadcrumb or an ancestor for right-to-left content. The default separator follows direction
  automatically.

## Avoid

- Do not use React names such as `BreadcrumbList` or `BreadcrumbPage`.
- Do not hand-write separators as text between Items.
- Do not put Separator inside Item.
- Do not render Page more than once.
- Do not add custom JavaScript or Alpine state to a static breadcrumb.
- Do not expose an entire deep hierarchy on small screens when Ellipsis or a dropdown would be clearer.
