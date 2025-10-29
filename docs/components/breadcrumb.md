# Breadcrumb

Displays the path to the current resource using a hierarchy of links.

```blade preview
<x-ux::breadcrumb>
    <x-ux::breadcrumb.list>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="#">Home</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator />
        <x-ux::breadcrumb.item>
            <x-ux::dropdown-menu>
                <x-ux::dropdown-menu.trigger class="flex items-center gap-1">
                    <x-ux::breadcrumb.ellipsis class="size-4" />
                </x-ux::dropdown-menu.trigger>
                <x-ux::dropdown-menu.content>
                    <x-ux::dropdown-menu.item>Documentation</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>Themes</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>GitHub</x-ux::dropdown-menu.item>
                </x-ux::dropdown-menu.content>
            </x-ux::dropdown-menu>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator />
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="#">Components</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator />
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.page>Breadcrumb</x-ux::breadcrumb.page>
        </x-ux::breadcrumb.item>
    </x-ux::breadcrumb.list>
</x-ux::breadcrumb>
```

## Usage

```blade
<x-ux::breadcrumb>
    <x-ux::breadcrumb.list>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="#">Home</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator />
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="#">Components</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator />
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.page>Breadcrumb</x-ux::breadcrumb.page>
        </x-ux::breadcrumb.item>
    </x-ux::breadcrumb.list>
</x-ux::breadcrumb>
```

## Examples

### Custom separator

Use a custom component as `$slot` for `<x-ux::breadcrumb.separator />` to create a custom separator.

```blade preview
<x-ux::breadcrumb>
    <x-ux::breadcrumb.list>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="#">Home</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator>
            <x-ux::icon name="slash" />
        </x-ux::breadcrumb.separator>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="#">Components</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator>
            <x-ux::icon name="slash" />
        </x-ux::breadcrumb.separator>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.page>Breadcrumb</x-ux::breadcrumb.page>
        </x-ux::breadcrumb.item>
    </x-ux::breadcrumb.list>
</x-ux::breadcrumb>
```

### Dropdown

You can compose `<x-ux::breadcrumb.item />` with a `<x-ux::dropdown-menu />` to create a dropdown in the breadcrumb.

```blade preview
<x-ux::breadcrumb>
    <x-ux::breadcrumb.list>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="#">Home</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator>
            <x-ux::icon name="slash" />
        </x-ux::breadcrumb.separator>
        <x-ux::breadcrumb.item>
            <x-ux::dropdown-menu>
                <x-ux::dropdown-menu.trigger class="flex items-center gap-1 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-3.5">
                    Components
                    <x-ux::icon name="chevron-down" />
                </x-ux::dropdown-menu.trigger>
                <x-ux::dropdown-menu.content align="start">
                    <x-ux::dropdown-menu.item>Documentation</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>Themes</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>GitHub</x-ux::dropdown-menu.item>
                </x-ux::dropdown-menu.content>
            </x-ux::dropdown-menu>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator>
            <x-ux::icon name="slash" />
        </x-ux::breadcrumb.separator>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.page>Breadcrumb</x-ux::breadcrumb.page>
        </x-ux::breadcrumb.item>
    </x-ux::breadcrumb.list>
</x-ux::breadcrumb>
```

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-breadcrumb --force
```
