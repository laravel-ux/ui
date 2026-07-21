# Table

Use Table to present structured records with consistent columns and semantic HTML.

## Composition

```text
x-ux::table
├── x-ux::table.caption
├── x-ux::table.header
│   └── x-ux::table.row
│       └── x-ux::table.head
├── x-ux::table.body
│   └── x-ux::table.row
│       └── x-ux::table.cell
└── x-ux::table.footer
```

Repeat Head and Cell for every column. Keep the same column order and effective column count across Header, Body, and Footer.

## Basic Table

```blade
<x-ux::table>
    <x-ux::table.caption>Recent invoices</x-ux::table.caption>
    <x-ux::table.header>
        <x-ux::table.row>
            <x-ux::table.head>Invoice</x-ux::table.head>
            <x-ux::table.head>Status</x-ux::table.head>
            <x-ux::table.head class="text-right">Amount</x-ux::table.head>
        </x-ux::table.row>
    </x-ux::table.header>
    <x-ux::table.body>
        @foreach ($invoices as $invoice)
            <x-ux::table.row>
                <x-ux::table.cell class="font-medium">{{ $invoice->number }}</x-ux::table.cell>
                <x-ux::table.cell>{{ $invoice->status }}</x-ux::table.cell>
                <x-ux::table.cell class="text-right">{{ $invoice->formatted_total }}</x-ux::table.cell>
            </x-ux::table.row>
        @endforeach
    </x-ux::table.body>
</x-ux::table>
```

Table provides its own horizontal overflow container. Do not add a second overflow wrapper unless the surrounding layout has a separate scrolling requirement.

## Captions and Headers

Use Caption to name or summarize the table for users. Keep column labels in Head elements, not ordinary Cells.

Use `scope="col"` on complex tables when header relationships may not be obvious:

```blade
<x-ux::table.head scope="col">Customer</x-ux::table.head>
```

For row headers, render a native `<th scope="row">` only when the row label needs explicit header semantics. Table Cell always renders `<td>`.

## Footer and Totals

Use Footer for totals and summaries:

```blade
<x-ux::table.footer>
    <x-ux::table.row>
        <x-ux::table.cell colspan="2">Total</x-ux::table.cell>
        <x-ux::table.cell class="text-right">{{ $formattedTotal }}</x-ux::table.cell>
    </x-ux::table.row>
</x-ux::table.footer>
```

Set `colspan` so the footer's effective column count matches the rest of the table.

## Row Actions

Keep actions in the final column and give its icon-only trigger an accessible name:

```blade
<x-ux::table.cell class="text-right">
    <x-ux::dropdown-menu>
        <x-ux::dropdown-menu.trigger as-child>
            <x-ux::button variant="ghost" size="icon" aria-label="Open row actions">
                <x-ux::icon name="ellipsis" />
            </x-ux::button>
        </x-ux::dropdown-menu.trigger>
        <x-ux::dropdown-menu.content align="end">
            <x-ux::dropdown-menu.item>Edit</x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item variant="destructive">Delete</x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.content>
    </x-ux::dropdown-menu>
</x-ux::table.cell>
```

Use `as-child` to avoid nesting one button inside another. Keep destructive actions visually and semantically distinct.

## Selection

Place Checkbox in the first column. Give every checkbox a stable unique ID and accessible name.

```blade
<x-ux::table.head class="w-8">
    <x-ux::checkbox id="select-all" aria-label="Select all rows" />
</x-ux::table.head>

<x-ux::table.cell>
    <x-ux::checkbox
        id="select-row-{{ $row->id }}"
        aria-label="Select {{ $row->name }}"
        wire:model="selectedRows"
        value="{{ $row->id }}"
    />
</x-ux::table.cell>
```

Set `data-state="selected"` on a selected Row to enable the built-in selected background. Keep selection state in the application; Table itself does not own sorting, filtering, pagination, or selection logic.

## Responsive Data

- Preserve essential identifying and action columns.
- Let the built-in container scroll horizontally when the table is wider than its viewport.
- Use `whitespace-normal` on Cells that should wrap long content; Cells are non-wrapping by default.
- Do not hide columns containing the only accessible label for a row action or selection control.
- For very small screens, consider an application-specific card or list presentation only when it communicates the same relationships clearly.

## Accessibility and RTL

- Use Table only for tabular relationships, not general page layout.
- Provide a Caption or nearby heading that clearly identifies the dataset.
- Keep Header, Body, Row, Head, and Cell nesting valid; browsers may silently rearrange invalid table markup.
- Use `colspan` and `rowspan` carefully and add explicit `scope` attributes for complex headers.
- Set `dir="rtl"` on Table or an ancestor for right-to-left datasets.
- Use logical alignment where meaning should follow direction. Keep numeric and currency columns consistently aligned according to the product's locale rules.

## Avoid

- Do not place Cells directly inside Table or Body; Cells belong inside Row.
- Do not use Head for ordinary body data.
- Do not duplicate the responsive overflow container.
- Do not attach a click handler to the entire Row when it also contains links, checkboxes, or action buttons.
- Do not add JavaScript for static table layout; add application state only for sorting, filtering, pagination, or selection.
- Do not paste React component names, JSX, or `className` into Blade templates.
