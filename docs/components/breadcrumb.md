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
                <x-ux::dropdown-menu.trigger as-child>
                    <x-ux::button size="icon-sm" variant="ghost">
                        <x-ux::breadcrumb.ellipsis />
                        <span class="sr-only">Toggle menu</span>
                    </x-ux::button>
                </x-ux::dropdown-menu.trigger>
                <x-ux::dropdown-menu.content align="start">
                    <x-ux::dropdown-menu.group>
                        <x-ux::dropdown-menu.item>Documentation</x-ux::dropdown-menu.item>
                        <x-ux::dropdown-menu.item>Themes</x-ux::dropdown-menu.item>
                        <x-ux::dropdown-menu.item>GitHub</x-ux::dropdown-menu.item>
                    </x-ux::dropdown-menu.group>
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
            <x-ux::breadcrumb.link href="/">Home</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator />
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="/components">
                Components
            </x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator />
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.page>Breadcrumb</x-ux::breadcrumb.page>
        </x-ux::breadcrumb.item>
    </x-ux::breadcrumb.list>
</x-ux::breadcrumb>
```

## Composition

Use the following composition to build a `x-ux::breadcrumb`:

```text
x-ux::breadcrumb
└── x-ux::breadcrumb.list
    ├── x-ux::breadcrumb.item
    │   └── x-ux::breadcrumb.link
    ├── x-ux::breadcrumb.separator
    ├── x-ux::breadcrumb.item
    │   └── x-ux::breadcrumb.link
    ├── x-ux::breadcrumb.separator
    └── x-ux::breadcrumb.item
        └── x-ux::breadcrumb.page
```

## Basic

A basic breadcrumb with a home link and a components link.

```blade preview
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

## Custom separator

Use a custom component as the slot for `x-ux::breadcrumb.separator` to create a custom separator.

```blade preview
<x-ux::breadcrumb>
    <x-ux::breadcrumb.list>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="/">Home</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator>
            <x-ux::icon name="dot" />
        </x-ux::breadcrumb.separator>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="/components">Components</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator>
            <x-ux::icon name="dot" />
        </x-ux::breadcrumb.separator>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.page>Breadcrumb</x-ux::breadcrumb.page>
        </x-ux::breadcrumb.item>
    </x-ux::breadcrumb.list>
</x-ux::breadcrumb>
```

## Dropdown

You can compose `x-ux::breadcrumb.item` with `x-ux::dropdown-menu` to create a dropdown in the breadcrumb.

```blade preview
<x-ux::breadcrumb>
    <x-ux::breadcrumb.list>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="/">Home</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator>
            <x-ux::icon name="dot" />
        </x-ux::breadcrumb.separator>
        <x-ux::breadcrumb.item>
            <x-ux::dropdown-menu>
                <x-ux::dropdown-menu.trigger class="flex items-center gap-1">
                    Components
                    <x-ux::icon name="chevron-down" data-icon="inline-end" class="size-3.5" />
                </x-ux::dropdown-menu.trigger>
                <x-ux::dropdown-menu.content align="start">
                    <x-ux::dropdown-menu.group>
                        <x-ux::dropdown-menu.item>Documentation</x-ux::dropdown-menu.item>
                        <x-ux::dropdown-menu.item>Themes</x-ux::dropdown-menu.item>
                        <x-ux::dropdown-menu.item>GitHub</x-ux::dropdown-menu.item>
                    </x-ux::dropdown-menu.group>
                </x-ux::dropdown-menu.content>
            </x-ux::dropdown-menu>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator>
            <x-ux::icon name="dot" />
        </x-ux::breadcrumb.separator>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.page>Breadcrumb</x-ux::breadcrumb.page>
        </x-ux::breadcrumb.item>
    </x-ux::breadcrumb.list>
</x-ux::breadcrumb>
```

## Collapsed

We provide a `x-ux::breadcrumb.ellipsis` component to show a collapsed state when the breadcrumb is too long.

```blade preview
<x-ux::breadcrumb>
    <x-ux::breadcrumb.list>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="/">Home</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator />
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.ellipsis />
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator />
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="/docs/components">Components</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator />
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.page>Breadcrumb</x-ux::breadcrumb.page>
        </x-ux::breadcrumb.item>
    </x-ux::breadcrumb.list>
</x-ux::breadcrumb>
```

## Link component

To use a custom link component from your routing library, pass its navigation attributes to `x-ux::breadcrumb.link`.

```blade preview
<x-ux::breadcrumb>
    <x-ux::breadcrumb.list>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="#link-component" wire:navigate>Home</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator />
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="#link-component" wire:navigate>Components</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator />
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.page>Breadcrumb</x-ux::breadcrumb.page>
        </x-ux::breadcrumb.item>
    </x-ux::breadcrumb.list>
</x-ux::breadcrumb>
```

## RTL

To enable RTL support, set the `dir="rtl"` attribute on a parent element.

```blade preview
<x-ux::breadcrumb dir="rtl">
    <x-ux::breadcrumb.list>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.link href="/">الرئيسية</x-ux::breadcrumb.link>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator>
            <x-ux::icon name="dot" />
        </x-ux::breadcrumb.separator>
        <x-ux::breadcrumb.item>
            <x-ux::dropdown-menu>
                <x-ux::dropdown-menu.trigger class="flex items-center gap-1">
                    المكونات
                    <x-ux::icon name="chevron-down" data-icon="inline-end" class="size-3.5" />
                </x-ux::dropdown-menu.trigger>
                <x-ux::dropdown-menu.content align="end" data-lang="ar" dir="rtl">
                    <x-ux::dropdown-menu.group>
                        <x-ux::dropdown-menu.item>التوثيق</x-ux::dropdown-menu.item>
                        <x-ux::dropdown-menu.item>السمات</x-ux::dropdown-menu.item>
                        <x-ux::dropdown-menu.item>جيت هاب</x-ux::dropdown-menu.item>
                    </x-ux::dropdown-menu.group>
                </x-ux::dropdown-menu.content>
            </x-ux::dropdown-menu>
        </x-ux::breadcrumb.item>
        <x-ux::breadcrumb.separator>
            <x-ux::icon name="dot" />
        </x-ux::breadcrumb.separator>
        <x-ux::breadcrumb.item>
            <x-ux::breadcrumb.page>مسار التنقل</x-ux::breadcrumb.page>
        </x-ux::breadcrumb.item>
    </x-ux::breadcrumb.list>
</x-ux::breadcrumb>
```

## Publishing

This component works out of the box, but you can publish its Blade views if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-breadcrumb --force
```
