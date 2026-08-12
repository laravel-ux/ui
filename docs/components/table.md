# Table

A responsive table component.

```blade preview
@php
    $invoices = [
        ['invoice' => 'INV001', 'status' => 'Paid', 'amount' => '$250.00', 'method' => 'Credit Card'],
        ['invoice' => 'INV002', 'status' => 'Pending', 'amount' => '$150.00', 'method' => 'PayPal'],
        ['invoice' => 'INV003', 'status' => 'Unpaid', 'amount' => '$350.00', 'method' => 'Bank Transfer'],
        ['invoice' => 'INV004', 'status' => 'Paid', 'amount' => '$450.00', 'method' => 'Credit Card'],
        ['invoice' => 'INV005', 'status' => 'Paid', 'amount' => '$550.00', 'method' => 'PayPal'],
        ['invoice' => 'INV006', 'status' => 'Pending', 'amount' => '$200.00', 'method' => 'Bank Transfer'],
        ['invoice' => 'INV007', 'status' => 'Unpaid', 'amount' => '$300.00', 'method' => 'Credit Card'],
    ];
@endphp

<x-ux::table>
    <x-ux::table.caption>A list of your recent invoices.</x-ux::table.caption>
    <x-ux::table.header>
        <x-ux::table.row>
            <x-ux::table.head class="w-[100px]">Invoice</x-ux::table.head>
            <x-ux::table.head>Status</x-ux::table.head>
            <x-ux::table.head>Method</x-ux::table.head>
            <x-ux::table.head class="text-right">Amount</x-ux::table.head>
        </x-ux::table.row>
    </x-ux::table.header>
    <x-ux::table.body>
        @foreach ($invoices as $invoice)
            <x-ux::table.row>
                <x-ux::table.cell class="font-medium">{{ $invoice['invoice'] }}</x-ux::table.cell>
                <x-ux::table.cell>{{ $invoice['status'] }}</x-ux::table.cell>
                <x-ux::table.cell>{{ $invoice['method'] }}</x-ux::table.cell>
                <x-ux::table.cell class="text-right">{{ $invoice['amount'] }}</x-ux::table.cell>
            </x-ux::table.row>
        @endforeach
    </x-ux::table.body>
    <x-ux::table.footer>
        <x-ux::table.row>
            <x-ux::table.cell colspan="3">Total</x-ux::table.cell>
            <x-ux::table.cell class="text-right">$2,500.00</x-ux::table.cell>
        </x-ux::table.row>
    </x-ux::table.footer>
</x-ux::table>
```

## Usage

```blade
<x-ux::table>
    <x-ux::table.caption>A list of your recent invoices.</x-ux::table.caption>
    <x-ux::table.header>
        <x-ux::table.row>
            <x-ux::table.head class="w-[100px]">Invoice</x-ux::table.head>
            <x-ux::table.head>Status</x-ux::table.head>
            <x-ux::table.head>Method</x-ux::table.head>
            <x-ux::table.head class="text-right">Amount</x-ux::table.head>
        </x-ux::table.row>
    </x-ux::table.header>
    <x-ux::table.body>
        <x-ux::table.row>
            <x-ux::table.cell class="font-medium">INV001</x-ux::table.cell>
            <x-ux::table.cell>Paid</x-ux::table.cell>
            <x-ux::table.cell>Credit Card</x-ux::table.cell>
            <x-ux::table.cell class="text-right">$250.00</x-ux::table.cell>
        </x-ux::table.row>
    </x-ux::table.body>
</x-ux::table>
```

## Composition

Use the following composition to build a `<x-ux::table>`:

```text
x-ux::table
├── x-ux::table.caption
├── x-ux::table.header
│   └── x-ux::table.row
│       ├── x-ux::table.head
│       ├── x-ux::table.head
│       ├── x-ux::table.head
│       └── x-ux::table.head
├── x-ux::table.body
│   ├── x-ux::table.row
│   │   ├── x-ux::table.cell
│   │   ├── x-ux::table.cell
│   │   ├── x-ux::table.cell
│   │   └── x-ux::table.cell
│   └── x-ux::table.row
└── x-ux::table.footer
```

## Footer

Use the `<x-ux::table.footer>` component to add a footer to the table.

```blade preview
<x-ux::table>
    <x-ux::table.caption>A list of your recent invoices.</x-ux::table.caption>
    <x-ux::table.header>
        <x-ux::table.row>
            <x-ux::table.head class="w-[100px]">Invoice</x-ux::table.head>
            <x-ux::table.head>Status</x-ux::table.head>
            <x-ux::table.head>Method</x-ux::table.head>
            <x-ux::table.head class="text-right">Amount</x-ux::table.head>
        </x-ux::table.row>
    </x-ux::table.header>
    <x-ux::table.body>
        @foreach ([
            ['INV001', 'Paid', 'Credit Card', '$250.00'],
            ['INV002', 'Pending', 'PayPal', '$150.00'],
            ['INV003', 'Unpaid', 'Bank Transfer', '$350.00'],
        ] as $invoice)
            <x-ux::table.row>
                <x-ux::table.cell class="font-medium">{{ $invoice[0] }}</x-ux::table.cell>
                <x-ux::table.cell>{{ $invoice[1] }}</x-ux::table.cell>
                <x-ux::table.cell>{{ $invoice[2] }}</x-ux::table.cell>
                <x-ux::table.cell class="text-right">{{ $invoice[3] }}</x-ux::table.cell>
            </x-ux::table.row>
        @endforeach
    </x-ux::table.body>
    <x-ux::table.footer>
        <x-ux::table.row>
            <x-ux::table.cell colspan="3">Total</x-ux::table.cell>
            <x-ux::table.cell class="text-right">$2,500.00</x-ux::table.cell>
        </x-ux::table.row>
    </x-ux::table.footer>
</x-ux::table>
```

## Actions

A table showing actions for each row using an `<x-ux::dropdown-menu>` component.

```blade preview
<x-ux::table>
    <x-ux::table.header>
        <x-ux::table.row>
            <x-ux::table.head>Product</x-ux::table.head>
            <x-ux::table.head>Price</x-ux::table.head>
            <x-ux::table.head class="text-right">Actions</x-ux::table.head>
        </x-ux::table.row>
    </x-ux::table.header>
    <x-ux::table.body>
        @foreach ([
            ['Wireless Mouse', '$29.99'],
            ['Mechanical Keyboard', '$129.99'],
            ['USB-C Hub', '$49.99'],
        ] as $product)
            <x-ux::table.row>
                <x-ux::table.cell class="font-medium">{{ $product[0] }}</x-ux::table.cell>
                <x-ux::table.cell>{{ $product[1] }}</x-ux::table.cell>
                <x-ux::table.cell class="text-right">
                    <x-ux::dropdown-menu>
                        <x-ux::dropdown-menu.trigger as-child>
                            <x-ux::button variant="ghost" size="icon" class="size-8" aria-label="Open menu">
                                <x-ux::icon name="ellipsis" />
                            </x-ux::button>
                        </x-ux::dropdown-menu.trigger>
                        <x-ux::dropdown-menu.content align="end">
                            <x-ux::dropdown-menu.item>Edit</x-ux::dropdown-menu.item>
                            <x-ux::dropdown-menu.item>Duplicate</x-ux::dropdown-menu.item>
                            <x-ux::dropdown-menu.separator />
                            <x-ux::dropdown-menu.item variant="destructive">Delete</x-ux::dropdown-menu.item>
                        </x-ux::dropdown-menu.content>
                    </x-ux::dropdown-menu>
                </x-ux::table.cell>
            </x-ux::table.row>
        @endforeach
    </x-ux::table.body>
</x-ux::table>
```

## Data Table

You can use the `<x-ux::table>` component to build more complex data tables with sorting, filtering, selection, and pagination. Keep data querying and state management in your application while using the Table parts for semantic markup and consistent styling.

## RTL

To enable RTL support, set the `dir="rtl"` attribute on the table or a parent element.

```blade preview
<x-ux::table dir="rtl">
    <x-ux::table.caption>قائمة بفواتيرك الأخيرة.</x-ux::table.caption>
    <x-ux::table.header>
        <x-ux::table.row>
            <x-ux::table.head class="w-[100px]">الفاتورة</x-ux::table.head>
            <x-ux::table.head>الحالة</x-ux::table.head>
            <x-ux::table.head>الطريقة</x-ux::table.head>
            <x-ux::table.head class="text-right">المبلغ</x-ux::table.head>
        </x-ux::table.row>
    </x-ux::table.header>
    <x-ux::table.body>
        @foreach ([
            ['INV001', 'مدفوع', 'بطاقة ائتمانية', '$250.00'],
            ['INV002', 'قيد الانتظار', 'PayPal', '$150.00'],
            ['INV003', 'غير مدفوع', 'تحويل بنكي', '$350.00'],
            ['INV004', 'مدفوع', 'بطاقة ائتمانية', '$450.00'],
            ['INV005', 'مدفوع', 'PayPal', '$550.00'],
            ['INV006', 'قيد الانتظار', 'تحويل بنكي', '$200.00'],
            ['INV007', 'غير مدفوع', 'بطاقة ائتمانية', '$300.00'],
        ] as $invoice)
            <x-ux::table.row>
                <x-ux::table.cell class="font-medium">{{ $invoice[0] }}</x-ux::table.cell>
                <x-ux::table.cell>{{ $invoice[1] }}</x-ux::table.cell>
                <x-ux::table.cell>{{ $invoice[2] }}</x-ux::table.cell>
                <x-ux::table.cell class="text-right">{{ $invoice[3] }}</x-ux::table.cell>
            </x-ux::table.row>
        @endforeach
    </x-ux::table.body>
    <x-ux::table.footer>
        <x-ux::table.row>
            <x-ux::table.cell colspan="3">المجموع</x-ux::table.cell>
            <x-ux::table.cell class="text-right">$2,500.00</x-ux::table.cell>
        </x-ux::table.row>
    </x-ux::table.footer>
</x-ux::table>
```

## Publishing

This component works out of the box, but you can publish its Blade views if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-table --force
```
