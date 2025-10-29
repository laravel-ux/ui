# Tabs

A set of layered sections of content—known as tab panels—that are displayed one at a time.

```blade preview
<div class="flex w-full max-w-sm flex-col gap-6">
    <x-ux::tabs value="account">
        <x-ux::tabs.list>
            <x-ux::tabs.trigger value="account">Account</x-ux::tabs.trigger>
            <x-ux::tabs.trigger value="password">Password</x-ux::tabs.trigger>
        </x-ux::tabs.list>
        <x-ux::tabs.content value="account">
            <x-ux::card>
                <x-ux::card.header>
                    <x-ux::card.title>Account</x-ux::card.title>
                    <x-ux::card.description>
                        Make changes to your account here. Click save when you're done.
                    </x-ux::card.description>
                </x-ux::card.header>
                <x-ux::card.content class="grid gap-6">
                    <div class="grid gap-3">
                        <x-ux::label for="tabs-demo-name">Name</x-ux::label>
                        <x-ux::input id="tabs-demo-name" value="Pedro Duarte" />
                    </div>
                    <div class="grid gap-3">
                        <x-ux::label for="tabs-demo-username">Username</x-ux::label>
                        <x-ux::input id="tabs-demo-username" value="@peduarte" />
                    </div>
                </x-ux::card.content>
                <x-ux::card.footer>
                    <x-ux::button>Save changes</x-ux::button>
                </x-ux::card.footer>
            </x-ux::card>
        </x-ux::tabs.content>
        <x-ux::tabs.content value="password">
            <x-ux::card>
                <x-ux::card.header>
                    <x-ux::card.title>Password</x-ux::card.title>
                    <x-ux::card.description>
                        Change your password here. After saving, you'll be logged out.
                    </x-ux::card.description>
                </x-ux::card.header>
                <x-ux::card.content class="grid gap-6">
                    <div class="grid gap-3">
                        <x-ux::label for="tabs-demo-current">Current password</x-ux::label>
                        <x-ux::input id="tabs-demo-current" type="password" />
                    </div>
                    <div class="grid gap-3">
                        <x-ux::label for="tabs-demo-new">New password</x-ux::label>
                        <x-ux::input id="tabs-demo-new" type="password" />
                    </div>
                </x-ux::card.content>
                <x-ux::card.footer>
                    <x-ux::button>Save password</x-ux::button>
                </x-ux::card.footer>
            </x-ux::card>
        </x-ux::tabs.content>
    </x-ux::tabs>
</div>
```

## Usage

```blade
<x-ux::tabs value="account" class="w-[400px]">
    <x-ux::tabs.list>
        <x-ux::tabs.trigger value="account">Account</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="password">Password</x-ux::tabs.trigger>
    </x-ux::tabs.list>
    <x-ux::tabs.content value="account">Make changes to your account here.</x-ux::tabs.content>
    <x-ux::tabs.content value="password">Change your password here.</x-ux::tabs.content>
</x-ux::tabs>
```

## API Reference

### Root

Contains all the parts of tabs.

| Prop                                                                           | Type     | Default |
|--------------------------------------------------------------------------------|----------|---------|
| `value` [?The value of the tab that should be active when initially rendered.] | `string` | `""`    |

### Trigger

The button that activates its associated content.

| Prop                                                                  | Type     | Default |
|-----------------------------------------------------------------------|----------|---------|
| `value` [?A unique value that associates the trigger with a content.] | `string` | -       |

### Content

Contains the content associated with each trigger.

| Prop                                                                  | Type     | Default |
|-----------------------------------------------------------------------|----------|---------|
| `value` [?A unique value that associates the content with a trigger.] | `string` | -       |


## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-tabs --force
```
