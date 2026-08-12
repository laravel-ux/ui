# Alert

Displays a callout for user attention.

```blade preview
<div class="grid w-full max-w-xl items-start gap-4">
    <x-ux::alert>
        <x-ux::icon name="circle-check" />
        <x-ux::alert.title>Payment successful</x-ux::alert.title>
        <x-ux::alert.description>
            Your payment of $29.99 has been processed. A receipt has been sent to your email address.
        </x-ux::alert.description>
    </x-ux::alert>
    <x-ux::alert>
        <x-ux::icon name="info" />
        <x-ux::alert.title>New feature available</x-ux::alert.title>
        <x-ux::alert.description>
            We've added dark mode support. You can enable it in your account settings.
        </x-ux::alert.description>
    </x-ux::alert>
</div>
```

## Usage

```blade
<x-ux::alert>
    <x-ux::icon name="info" />
    <x-ux::alert.title>Heads up!</x-ux::alert.title>
    <x-ux::alert.description>
        You can add components and dependencies to your app using the cli.
    </x-ux::alert.description>
    <x-ux::alert.action>
        <x-ux::button variant="outline">Enable</x-ux::button>
    </x-ux::alert.action>
</x-ux::alert>
```

## Composition

Use the following composition to build an `x-ux::alert`:

```text
x-ux::alert
├── x-ux::icon
├── x-ux::alert.title
├── x-ux::alert.description
└── x-ux::alert.action
```

## Basic

A basic alert with an icon, title and description.

```blade preview
<x-ux::alert>
    <x-ux::icon name="circle-check" />
    <x-ux::alert.title>Account updated successfully</x-ux::alert.title>
    <x-ux::alert.description>
        Your profile information has been saved. Changes will be reflected immediately.
    </x-ux::alert.description>
</x-ux::alert>
```

## Destructive

Use `variant="destructive"` to create a destructive alert.

```blade preview
<x-ux::alert variant="destructive">
    <x-ux::icon name="circle-alert" />
    <x-ux::alert.title>Payment failed</x-ux::alert.title>
    <x-ux::alert.description>
        Your payment could not be processed. Please check your payment method and try again.
    </x-ux::alert.description>
</x-ux::alert>
```

## Action

Use `x-ux::alert.action` to add a button or other action element to the alert.

```blade preview
<x-ux::alert>
    <x-ux::icon name="info" />
    <x-ux::alert.title>Dark mode is now available</x-ux::alert.title>
    <x-ux::alert.description>
        Enable it under your profile settings to get started.
    </x-ux::alert.description>
    <x-ux::alert.action>
        <x-ux::button size="xs" variant="default">Enable</x-ux::button>
    </x-ux::alert.action>
</x-ux::alert>
```

## Custom Colors

Customize the alert colors by adding color utilities to the `x-ux::alert` component.

```blade preview
<x-ux::alert class="border-amber-200 bg-amber-50 text-amber-900 dark:border-amber-900 dark:bg-amber-950 dark:text-amber-100">
    <x-ux::icon name="triangle-alert" />
    <x-ux::alert.title>Your subscription will expire in 3 days.</x-ux::alert.title>
    <x-ux::alert.description class="text-amber-800 dark:text-amber-200">
        Renew now to avoid service interruption or upgrade to a paid plan to continue using the service.
    </x-ux::alert.description>
</x-ux::alert>
```

## RTL

Set `dir="rtl"` when the alert is displayed in a right-to-left interface.

```blade preview
<div dir="rtl" class="grid w-full max-w-xl items-start gap-4">
    <x-ux::alert>
        <x-ux::icon name="circle-check" />
        <x-ux::alert.title>تم الدفع بنجاح</x-ux::alert.title>
        <x-ux::alert.description>
            تمت معالجة دفعتك البالغة 29.99 دولارًا. تم إرسال إيصال إلى عنوان بريدك الإلكتروني.
        </x-ux::alert.description>
    </x-ux::alert>
    <x-ux::alert>
        <x-ux::icon name="info" />
        <x-ux::alert.title>ميزة جديدة متاحة</x-ux::alert.title>
        <x-ux::alert.description>
            لقد أضفنا دعم الوضع الداكن. يمكنك تفعيله في إعدادات حسابك.
        </x-ux::alert.description>
    </x-ux::alert>
</div>
```

## API Reference

### x-ux::alert

| Prop      | Type                                       | Default     |
|-----------|--------------------------------------------|-------------|
| `variant` | `enum` [?"default" \| "destructive"]      | `"default"` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-alert --force
```
