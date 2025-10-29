# Sheet

Extends the Dialog component to display content that complements the main content of the screen.

```blade preview
<x-ux::sheet>
    <x-ux::sheet.trigger>
        <x-ux::button variant="outline">Open</x-ux::button>
    </x-ux::sheet.trigger>
    <x-ux::sheet.content>
        <x-ux::sheet.header>
            <x-ux::sheet.title>Edit profile</x-ux::sheet.title>
            <x-ux::sheet.description>
                Make changes to your profile here. Click save when you're done.
            </x-ux::sheet.description>
        </x-ux::sheet.header>
        <div class="grid flex-1 auto-rows-min gap-6 px-4">
            <div class="grid gap-3">
                <x-ux::label for="sheet-demo-name">Name</x-ux::label>
                <x-ux::input id="sheet-demo-name" value="Pedro Duarte" />
            </div>
            <div class="grid gap-3">
                <x-ux::label for="sheet-demo-username">Username</x-ux::label>
                <x-ux::input id="sheet-demo-username" value="@peduarte" />
            </div>
        </div>
        <x-ux::sheet.footer>
            <x-ux::button type="submit">Save changes</x-ux::button>
            <x-ux::sheet.close variant="outline">
                Close
            </x-ux::sheet.close>
        </x-ux::sheet.footer>
    </x-ux::sheet.content>
</x-ux::sheet>
```

## Usage

```blade
<x-ux::sheet>
    <x-ux::sheet.trigger>Open</x-ux::sheet.trigger>
    <x-ux::sheet.content>
        <x-ux::sheet.header>
            <x-ux::sheet.title>Are you absolutely sure?</x-ux::sheet.title>
            <x-ux::sheet.description>
                This action cannot be undone. This will permanently delete your account and remove your data from our servers.
            </x-ux::sheet.description>
        </x-ux::sheet.header>
    </x-ux::sheet.content>
</x-ux::sheet>
```

## API Reference

### Root

Contains all the parts of a sheet.

| Prop                                              | Type      | Default |
|---------------------------------------------------|-----------|---------|
| `open` [?The controlled open state of the sheet.] | `boolean` | `false` |

### Content

Contains the content associated with the sheet.

| Prop                                                                       | Type                                            | Default   |
|----------------------------------------------------------------------------|-------------------------------------------------|-----------|
| `side` [?Indicate the edge of the screen where the component will appear.] | `enum`[?"top" \| "right" \| "bottom" \| "left"] | `"right"` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-sheet --force
```
