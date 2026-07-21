@blaze
<div data-slot="table-container" class="relative w-full overflow-x-auto">
    <table
        data-slot="table"
        {{ $attributes->tailwindMerge('w-full caption-bottom text-sm') }}
    >
        {{ $slot }}
    </table>
</div>
