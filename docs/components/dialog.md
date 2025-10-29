# Dialog

A window overlaid on either the primary window or another dialog window, rendering the content underneath inert.

```blade preview
<x-ux::dialog>
    <x-ux::dialog.trigger>
        <x-ux::button variant="outline">Open</x-ux::button>
    </x-ux::dialog.trigger>
    <x-ux::dialog.content class="sm:max-w-[425px]">
        <x-ux::dialog.header>
            <x-ux::dialog.title>Edit profile</x-ux::dialog.title>
            <x-ux::dialog.description>
                Make changes to your profile here. Click save when you're done.
            </x-ux::dialog.description>
        </x-ux::dialog.header>
        <div class="grid gap-4">
            <div class="grid gap-3">
              <x-ux::label for="name-1">Name</x-ux::label>
              <x-ux::input id="name-1" name="name" value="Pedro Duarte" />
            </div>
            <div class="grid gap-3">
                <x-ux::label for="username-1">Username</x-ux::label>
                <x-ux::input id="username-1" name="username" value="@peduarte" />
            </div>
        </div>
        <x-ux::dialog.footer>
            <x-ux::dialog.close variant="outline">
                Cancel
            </x-ux::dialog.close>
            <x-ux::button type="submit">Save changes</x-ux::button>
        </x-ux::dialog.footer>
    </x-ux::dialog.content>
</x-ux::dialog>
```

## Usage

```blade
<x-ux::dialog>
    <x-ux::dialog.trigger>Open</x-ux::dialog.trigger>
    <x-ux::dialog.content>
        <x-ux::dialog.header>
            <x-ux::dialog.title>Are you absolutely sure?</x-ux::dialog.title>
            <x-ux::dialog.description>
                This action cannot be undone. This will permanently delete your account and remove your data from our servers.
            </x-ux::dialog.description>
        </x-ux::dialog.header>
    </x-ux::dialog.content>
</x-ux::dialog>
```

## API Reference

### Root

Contains all the parts of a dialog.

| Prop                                              | Type      | Default |
|---------------------------------------------------|-----------|---------|
| `open`[?The controlled open state of the dialog.] | `boolean` | `false` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-dialog --force
```
