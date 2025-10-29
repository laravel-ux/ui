# Accordion

A vertically stacked set of interactive headings that each reveal a section of content.

```blade preview
<x-ux::accordion class="w-full" value="item-1">
    <x-ux::accordion.item value="item-1">
        <x-ux::accordion.trigger>
            Product Information
        </x-ux::accordion.trigger>
        <x-ux::accordion.content class="flex flex-col gap-4 text-balance">
            <p>
                Our flagship product combines cutting-edge technology with sleek design.
                Built with premium materials, it offers unparalleled performance and reliability.
            </p>
            <p>
                Key features include advanced processing capabilities, and an intuitive user interface designed for both beginners and experts.
            </p>
        </x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="item-2">
        <x-ux::accordion.trigger>
            Shipping Details
        </x-ux::accordion.trigger>
        <x-ux::accordion.content class="flex flex-col gap-4 text-balance">
            <p>
                We offer worldwide shipping through trusted courier partners.
                Standard delivery takes 3-5 business days, while express shipping ensures delivery within 1-2 business days.
            </p>
            <p>
                All orders are carefully packaged and fully insured.
                Track your shipment in real-time through our dedicated tracking portal.
            </p>
        </x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="item-3">
        <x-ux::accordion.trigger>
            Return Policy
        </x-ux::accordion.trigger>
        <x-ux::accordion.content class="flex flex-col gap-4 text-balance">
            <p>
                We stand behind our products with a comprehensive 30-day return policy.
                If you're not completely satisfied, simply return the item in its original condition.
            </p>
            <p>
                Our hassle-free return process includes free return shipping and full refunds processed within 48 hours of receiving the returned item.
            </p>
        </x-ux::accordion.content>
    </x-ux::accordion.item>
</x-ux::accordion>
```

## Usage

```blade
<x-ux::accordion>
    <x-ux::accordion.item value="item-1">
        <x-ux::accordion.trigger>
            Is it accessible?
        </x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Yes. It adheres to the WAI-ARIA design pattern.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
</x-ux::accordion>
```

## API Reference

### Root

Contains all the parts of an accordion.

| Prop                                                                | Type      | Default |
|---------------------------------------------------------------------|-----------|---------|
| `value` [?The value of the item to expand when initially rendered.] | `string`  | `""`    |

### Item

Contains all the parts of a collapsible section.

| Prop                                    | Type     | Default |
|-----------------------------------------|----------|---------|
| `value` [?A unique value for the item.] | `string` | -       |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-accordion --force
```
