# Pagination

Use `x-ux::pagination` for page navigation.

```blade
<x-ux::pagination>
    <x-ux::pagination.content>
        <x-ux::pagination.item><x-ux::pagination.previous href="#" /></x-ux::pagination.item>
        <x-ux::pagination.item><x-ux::pagination.link href="#" active>1</x-ux::pagination.link></x-ux::pagination.item>
        <x-ux::pagination.item><x-ux::pagination.next href="#" /></x-ux::pagination.item>
    </x-ux::pagination.content>
</x-ux::pagination>
```

- Keep each control inside `x-ux::pagination.item`.
- Use `active` only for the current page; it adds `aria-current="page"`.
- Put localized text directly in the slot of `x-ux::pagination.previous` and `x-ux::pagination.next`; leave them self-closing for the default translated labels.
- Previous and next icons flip automatically in RTL.
- Match the shadcn blocks: main demo, Composition, Simple, Icons Only, and RTL.
