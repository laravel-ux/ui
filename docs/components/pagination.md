# Pagination

Pagination with page navigation, next and previous links.

```blade preview
<x-ux::pagination>
    <x-ux::pagination.content>
        <x-ux::pagination.item>
            <x-ux::pagination.previous href="#" />
        </x-ux::pagination.item>
        <x-ux::pagination.item>
            <x-ux::pagination.link href="#">1</x-ux::pagination.link>
        </x-ux::pagination.item>
        <x-ux::pagination.item>
            <x-ux::pagination.link href="#" active>2</x-ux::pagination.link>
        </x-ux::pagination.item>
        <x-ux::pagination.item>
            <x-ux::pagination.link href="#">3</x-ux::pagination.link>
        </x-ux::pagination.item>
        <x-ux::pagination.item>
            <x-ux::pagination.ellipsis />
        </x-ux::pagination.item>
        <x-ux::pagination.item>
            <x-ux::pagination.next href="#" />
        </x-ux::pagination.item>
    </x-ux::pagination.content>
</x-ux::pagination>
```

## Usage

```blade
<x-ux::pagination>
    <x-ux::pagination.content>
        <x-ux::pagination.item>
            <x-ux::pagination.previous href="#" />
        </x-ux::pagination.item>
        <x-ux::pagination.item>
            <x-ux::pagination.link href="#">1</x-ux::pagination.link>
        </x-ux::pagination.item>
        <x-ux::pagination.item>
            <x-ux::pagination.ellipsis />
        </x-ux::pagination.item>
        <x-ux::pagination.item>
            <x-ux::pagination.next href="#" />
        </x-ux::pagination.item>
    </x-ux::pagination.content>
</x-ux::pagination>
```

## Composition

```text
x-ux::pagination
└── x-ux::pagination.content
    ├── x-ux::pagination.item
    │   └── x-ux::pagination.previous
    ├── x-ux::pagination.item
    │   └── x-ux::pagination.link
    ├── x-ux::pagination.item
    │   └── x-ux::pagination.ellipsis
    └── x-ux::pagination.item
        └── x-ux::pagination.next
```

## Simple

A simple pagination with only page numbers.

```blade preview
<x-ux::pagination>
    <x-ux::pagination.content>
        @foreach(range(1, 5) as $page)
            <x-ux::pagination.item>
                <x-ux::pagination.link href="#" :active="$page === 2">{{ $page }}</x-ux::pagination.link>
            </x-ux::pagination.item>
        @endforeach
    </x-ux::pagination.content>
</x-ux::pagination>
```

## Icons Only

Use just the previous and next buttons without page numbers. This is useful for data tables with a rows per page selector.

```blade preview
<div class="flex items-center justify-between gap-4">
    <x-ux::field orientation="horizontal" class="w-fit">
        <x-ux::field.label for="pagination-rows-per-page">Rows per page</x-ux::field.label>
        <x-ux::select value="25">
            <x-ux::select.trigger id="pagination-rows-per-page" class="w-20">
                <x-ux::select.value />
            </x-ux::select.trigger>
            <x-ux::select.content align="start">
                <x-ux::select.group>
                    <x-ux::select.item value="10">10</x-ux::select.item>
                    <x-ux::select.item value="25">25</x-ux::select.item>
                    <x-ux::select.item value="50">50</x-ux::select.item>
                    <x-ux::select.item value="100">100</x-ux::select.item>
                </x-ux::select.group>
            </x-ux::select.content>
        </x-ux::select>
    </x-ux::field>
    <x-ux::pagination class="mx-0 w-auto">
        <x-ux::pagination.content>
            <x-ux::pagination.item><x-ux::pagination.previous href="#" /></x-ux::pagination.item>
            <x-ux::pagination.item><x-ux::pagination.next href="#" /></x-ux::pagination.item>
        </x-ux::pagination.content>
    </x-ux::pagination>
</div>
```

## RTL

```blade preview
<div dir="rtl">
    <x-ux::pagination>
        <x-ux::pagination.content>
            <x-ux::pagination.item><x-ux::pagination.previous href="#">السابق</x-ux::pagination.previous></x-ux::pagination.item>
            <x-ux::pagination.item><x-ux::pagination.link href="#">١</x-ux::pagination.link></x-ux::pagination.item>
            <x-ux::pagination.item><x-ux::pagination.link href="#" active>٢</x-ux::pagination.link></x-ux::pagination.item>
            <x-ux::pagination.item><x-ux::pagination.link href="#">٣</x-ux::pagination.link></x-ux::pagination.item>
            <x-ux::pagination.item><x-ux::pagination.ellipsis /></x-ux::pagination.item>
            <x-ux::pagination.item><x-ux::pagination.next href="#">التالي</x-ux::pagination.next></x-ux::pagination.item>
        </x-ux::pagination.content>
    </x-ux::pagination>
</div>
```

## API Reference

### x-ux::pagination.link

| Prop | Type | Default |
| --- | --- | --- |
| `active` | `boolean` | `false` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-pagination --force
```
