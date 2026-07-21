# Accordion

A vertically stacked set of interactive headings that each reveal a section of content.

```blade preview
<x-ux::accordion class="w-full" value="item-1">
    <x-ux::accordion.item value="item-1">
        <x-ux::accordion.trigger>What shipping methods are available?</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Choose standard delivery in 5–7 days, express delivery in 2–3 days, or next-day delivery. International orders ship free.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="item-2">
        <x-ux::accordion.trigger>How does the return policy work?</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Unused products can be returned in their original packaging within 30 days for a full refund.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="item-3">
        <x-ux::accordion.trigger>How can I contact support?</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Contact our support team by email or live chat. We usually respond within one business day.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
</x-ux::accordion>
```

## Usage

```blade
<x-ux::accordion value="item-1">
    <x-ux::accordion.item value="item-1">
        <x-ux::accordion.trigger>Is it accessible?</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Yes. It follows the WAI-ARIA accordion pattern.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
</x-ux::accordion>
```

## Composition

Use the following composition to build an `x-ux::accordion`:

```text
x-ux::accordion
├── x-ux::accordion.item
│   ├── x-ux::accordion.trigger
│   └── x-ux::accordion.content
└── x-ux::accordion.item
    ├── x-ux::accordion.trigger
    └── x-ux::accordion.content
```

## Basic

A basic accordion that displays one panel at a time and starts with the first panel open.

```blade preview
<x-ux::accordion class="w-full" value="item-1">
    <x-ux::accordion.item value="item-1">
        <x-ux::accordion.trigger>How do I reset my password?</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Select “Forgot password” on the sign-in page and enter your email address. The reset link remains valid for 24 hours.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="item-2">
        <x-ux::accordion.trigger>Can I change my subscription?</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            You can upgrade, downgrade, or cancel your plan from the billing settings at any time.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="item-3">
        <x-ux::accordion.trigger>Which payment methods are accepted?</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            We accept major credit cards and supported digital wallets.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
</x-ux::accordion>
```

## Multiple

Use `multiple` to allow several panels to remain open at the same time. In this mode, `value` is an array.

```blade preview
<x-ux::accordion multiple :value="['item-1']" class="w-full">
    <x-ux::accordion.item value="item-1">
        <x-ux::accordion.trigger>Notification settings</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Choose whether updates arrive by email, push notification, or both.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="item-2">
        <x-ux::accordion.trigger>Privacy and security</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Manage two-factor authentication, active sessions, and profile visibility.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="item-3">
        <x-ux::accordion.trigger>Billing and subscription</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Review invoices, update your payment method, or change your plan.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
</x-ux::accordion>
```

## Disabled

Use `disabled` on an Accordion Item to prevent that panel from being toggled.

```blade preview
<x-ux::accordion class="w-full" value="item-1">
    <x-ux::accordion.item value="item-1">
        <x-ux::accordion.trigger>Can I view my account history?</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Your recent sign-ins and account activity are available from the security page.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="item-2" disabled>
        <x-ux::accordion.trigger>Premium feature details</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Upgrade your account to access this information.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="item-3">
        <x-ux::accordion.trigger>How do I update my email address?</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Change your email from profile settings and confirm the new address.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
</x-ux::accordion>
```

## Borders

Add a border and rounded corners to the root, then add horizontal padding to each item.

```blade preview
<x-ux::accordion class="w-full rounded-lg border" value="item-1">
    <x-ux::accordion.item value="item-1" class="px-4">
        <x-ux::accordion.trigger>How does billing work?</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Billing occurs at the start of each monthly or annual cycle. You can cancel at any time.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="item-2" class="px-4">
        <x-ux::accordion.trigger>Is my data protected?</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Data is encrypted in transit and at rest, with regular backups and access monitoring.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="item-3" class="px-4">
        <x-ux::accordion.trigger>Which integrations are supported?</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            Connect common analytics, messaging, automation, and developer tools.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
</x-ux::accordion>
```

## Card

Place the accordion inside a Card to add supporting title and description content.

```blade preview
<x-ux::card class="w-full">
    <x-ux::card.header>
        <x-ux::card.title>Subscription and billing</x-ux::card.title>
        <x-ux::card.description>
            Frequently asked questions about plans, payments, and cancellations.
        </x-ux::card.description>
    </x-ux::card.header>
    <x-ux::card.content>
        <x-ux::accordion value="item-1">
            <x-ux::accordion.item value="item-1">
                <x-ux::accordion.trigger>Which plans are available?</x-ux::accordion.trigger>
                <x-ux::accordion.content>
                    Choose a plan based on the storage, API access, and collaboration features your team needs.
                </x-ux::accordion.content>
            </x-ux::accordion.item>
            <x-ux::accordion.item value="item-2">
                <x-ux::accordion.trigger>When will I be billed?</x-ux::accordion.trigger>
                <x-ux::accordion.content>
                    Your payment method is charged at the beginning of each billing period.
                </x-ux::accordion.content>
            </x-ux::accordion.item>
            <x-ux::accordion.item value="item-3">
                <x-ux::accordion.trigger>How do I cancel?</x-ux::accordion.trigger>
                <x-ux::accordion.content>
                    Cancel from billing settings. Access remains active until the end of the current period.
                </x-ux::accordion.content>
            </x-ux::accordion.item>
        </x-ux::accordion>
    </x-ux::card.content>
</x-ux::card>
```

## RTL

Set `dir="rtl"` when the accordion is displayed in a right-to-left interface.

```blade preview
<x-ux::accordion dir="rtl" class="w-full" value="item-1">
    <x-ux::accordion.item value="item-1">
        <x-ux::accordion.trigger>كيف يمكنني إعادة تعيين كلمة المرور؟</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            انقر على 'نسيت كلمة المرور' في صفحة تسجيل الدخول، أدخل عنوان بريدك الإلكتروني، وسنرسل لك رابطًا لإعادة تعيين كلمة المرور. سينتهي صلاحية الرابط خلال 24 ساعة.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="item-2">
        <x-ux::accordion.trigger>هل يمكنني تغيير خطة الاشتراك الخاصة بي؟</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            يمكنك تغيير الخطة من إعدادات الفوترة في أي وقت.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
    <x-ux::accordion.item value="item-3">
        <x-ux::accordion.trigger>ما هي طرق الدفع التي تقبلونها؟</x-ux::accordion.trigger>
        <x-ux::accordion.content>
            نقبل بطاقات الائتمان الرئيسية وطرق الدفع الرقمية المدعومة.
        </x-ux::accordion.content>
    </x-ux::accordion.item>
</x-ux::accordion>
```

## API Reference

### x-ux::accordion

| Prop                                                          | Type           | Default |
|---------------------------------------------------------------|----------------|---------|
| `value` [?The value of the item or items expanded initially.] | `string\|array` | `null`  |
| `multiple` [?Whether multiple items can be open at once.]     | `boolean`      | `false` |
| `disabled` [?Whether the accordion ignores interaction.]      | `boolean`      | `false` |

### x-ux::accordion.item

| Prop                                                     | Type      | Default |
|----------------------------------------------------------|-----------|---------|
| `value*` [?A unique value for the item.]                 | `string`  | -       |
| `disabled` [?Whether the item ignores user interaction.] | `boolean` | `false` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-accordion --force
```
