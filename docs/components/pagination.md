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

## API Reference

### Link

A pagination link.

| Prop                                                                | Type      | Default |
|---------------------------------------------------------------------|-----------|---------|
| `active` [?Used to identify the link as the currently active page.] | `boolean` | `false` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-pagination --force
```

