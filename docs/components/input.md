# Input

A text input component for forms and user data entry with built-in styling and accessibility states.

```blade preview
<x-ux::field class="w-full max-w-xs">
    <x-ux::field.label for="input-demo-api-key">API Key</x-ux::field.label>
    <x-ux::input id="input-demo-api-key" type="password" placeholder="laravel_..." />
    <x-ux::field.description>
        Your Laravel Cloud API key is encrypted and stored securely.
    </x-ux::field.description>
</x-ux::field>
```

## Usage

```blade
<x-ux::input />
```

## Basic

```blade preview
<x-ux::input class="max-w-xs" placeholder="Enter text" />
```

## Field

Use x-ux::field, x-ux::field.label, and x-ux::field.description to add a label and supporting text.

```blade preview
<x-ux::field class="w-full max-w-xs">
    <x-ux::field.label for="input-field-username">Username</x-ux::field.label>
    <x-ux::input id="input-field-username" placeholder="Enter your username" />
    <x-ux::field.description>
        Choose a unique username for your Laravel application.
    </x-ux::field.description>
</x-ux::field>
```

## Field Group

Use x-ux::field.group to build forms from multiple fields.

```blade preview
<x-ux::field.group class="w-full max-w-xs">
    <x-ux::field>
        <x-ux::field.label for="input-group-name">Name</x-ux::field.label>
        <x-ux::input id="input-group-name" placeholder="Taylor" />
    </x-ux::field>
    <x-ux::field>
        <x-ux::field.label for="input-group-email">Email</x-ux::field.label>
        <x-ux::input id="input-group-email" type="email" placeholder="name@example.com" />
        <x-ux::field.description>We'll send application updates to this address.</x-ux::field.description>
    </x-ux::field>
    <x-ux::field orientation="horizontal">
        <x-ux::button type="reset" variant="outline">Reset</x-ux::button>
        <x-ux::button type="submit">Submit</x-ux::button>
    </x-ux::field>
</x-ux::field.group>
```

## Disabled

Add `disabled` to x-ux::input and `data-disabled` to its x-ux::field.

```blade preview
<x-ux::field data-disabled class="w-full max-w-xs">
    <x-ux::field.label for="input-disabled">Email</x-ux::field.label>
    <x-ux::input id="input-disabled" type="email" placeholder="Email" disabled />
    <x-ux::field.description>This field is currently disabled.</x-ux::field.description>
</x-ux::field>
```

## Invalid

Add `aria-invalid="true"` to x-ux::input and `data-invalid="true"` to its x-ux::field.

```blade preview
<x-ux::field data-invalid="true" class="w-full max-w-xs">
    <x-ux::field.label for="input-invalid">Application name</x-ux::field.label>
    <x-ux::input id="input-invalid" placeholder="Laravel" aria-invalid="true" />
    <x-ux::field.description>This application name is already in use.</x-ux::field.description>
</x-ux::field>
```

## File

```blade preview
<x-ux::field class="w-full max-w-xs">
    <x-ux::field.label for="input-picture">Picture</x-ux::field.label>
    <x-ux::input id="input-picture" type="file" />
    <x-ux::field.description>Select a picture to upload.</x-ux::field.description>
</x-ux::field>
```

## Inline

```blade preview
<x-ux::field orientation="horizontal" class="w-full max-w-xs">
    <x-ux::input type="search" placeholder="Search documentation..." />
    <x-ux::button>Search</x-ux::button>
</x-ux::field>
```

## Grid

```blade preview
<x-ux::field.group class="grid w-full max-w-sm grid-cols-2">
    <x-ux::field>
        <x-ux::field.label for="input-first-name">First Name</x-ux::field.label>
        <x-ux::input id="input-first-name" placeholder="Taylor" />
    </x-ux::field>
    <x-ux::field>
        <x-ux::field.label for="input-last-name">Last Name</x-ux::field.label>
        <x-ux::input id="input-last-name" placeholder="Otwell" />
    </x-ux::field>
</x-ux::field.group>
```

## Required

```blade preview
<x-ux::field class="w-full max-w-xs">
    <x-ux::field.label for="input-required">
        Application Name <span class="text-destructive">*</span>
    </x-ux::field.label>
    <x-ux::input id="input-required" placeholder="My Laravel App" required />
    <x-ux::field.description>This field must be filled out.</x-ux::field.description>
</x-ux::field>
```

## Badge

```blade preview
<x-ux::field class="w-full max-w-xs">
    <x-ux::field.label for="input-webhook">
        Webhook URL
        <x-ux::badge variant="secondary" class="ml-auto">Beta</x-ux::badge>
    </x-ux::field.label>
    <x-ux::input id="input-webhook" type="url" placeholder="https://example.com/webhook" />
</x-ux::field>
```

## Input Group

Use x-ux::input-group to place icons or text inside an input.

```blade preview
<x-ux::field class="w-full max-w-xs">
    <x-ux::field.label for="input-website">Website URL</x-ux::field.label>
    <x-ux::input-group>
        <x-ux::input-group.input id="input-website" placeholder="laravel.com" />
        <x-ux::input-group.addon>
            <x-ux::input-group.text>https://</x-ux::input-group.text>
        </x-ux::input-group.addon>
        <x-ux::input-group.addon align="inline-end">
            <x-ux::icon name="info" />
        </x-ux::input-group.addon>
    </x-ux::input-group>
</x-ux::field>
```

## Button Group

```blade preview
<x-ux::field class="w-full max-w-xs">
    <x-ux::field.label for="input-button-group">Search</x-ux::field.label>
    <x-ux::button-group>
        <x-ux::input id="input-button-group" placeholder="Search packages..." />
        <x-ux::button variant="outline">Search</x-ux::button>
    </x-ux::button-group>
</x-ux::field>
```

## Form

```blade preview
<form class="w-full max-w-sm">
    <x-ux::field.group>
        <x-ux::field>
            <x-ux::field.label for="form-name">Name</x-ux::field.label>
            <x-ux::input id="form-name" placeholder="Taylor Otwell" required />
        </x-ux::field>
        <x-ux::field>
            <x-ux::field.label for="form-email">Email</x-ux::field.label>
            <x-ux::input id="form-email" type="email" placeholder="taylor@laravel.com" />
            <x-ux::field.description>We'll never share your email with anyone.</x-ux::field.description>
        </x-ux::field>
        <div class="grid grid-cols-2 gap-4">
            <x-ux::field>
                <x-ux::field.label for="form-phone">Phone</x-ux::field.label>
                <x-ux::input id="form-phone" type="tel" placeholder="+380 50 123 45 67" />
            </x-ux::field>
            <x-ux::field>
                <x-ux::field.label for="form-country">Country</x-ux::field.label>
                <x-ux::select value="ua">
                    <x-ux::select.trigger id="form-country">
                        <x-ux::select.value placeholder="Select country" />
                    </x-ux::select.trigger>
                    <x-ux::select.content>
                        <x-ux::select.item value="ua">Ukraine</x-ux::select.item>
                        <x-ux::select.item value="us">United States</x-ux::select.item>
                        <x-ux::select.item value="ca">Canada</x-ux::select.item>
                    </x-ux::select.content>
                </x-ux::select>
            </x-ux::field>
        </div>
        <x-ux::field>
            <x-ux::field.label for="form-address">Address</x-ux::field.label>
            <x-ux::input id="form-address" placeholder="1 Laravel Way" />
        </x-ux::field>
        <x-ux::field orientation="horizontal">
            <x-ux::button type="button" variant="outline">Cancel</x-ux::button>
            <x-ux::button type="submit">Submit</x-ux::button>
        </x-ux::field>
    </x-ux::field.group>
</form>
```

## RTL

```blade preview
<x-ux::field class="w-full max-w-xs" dir="rtl">
    <x-ux::field.label for="input-rtl-api-key">مفتاح API</x-ux::field.label>
    <x-ux::input id="input-rtl-api-key" type="password" placeholder="laravel_..." />
    <x-ux::field.description>
        مفتاح Laravel Cloud API الخاص بك مشفر ومخزن بأمان.
    </x-ux::field.description>
</x-ux::field>
```

## Publishing

```shell
php artisan vendor:publish --tag=ux-input --force
```
