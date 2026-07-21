# Alert

Use Alert to present an important callout, status, warning, or error that deserves user attention.

## Composition

```text
x-ux::alert
├── x-ux::icon
├── x-ux::alert.title
├── x-ux::alert.description
└── x-ux::alert.action
```

Title, Description, Icon, and Action are optional. Use only the parts the message needs.

## API

### `x-ux::alert`

| Prop      | Type                       | Default     | Purpose                    |
|-----------|----------------------------|-------------|----------------------------|
| `variant` | `default\|destructive`      | `default`   | Set the visual importance. |

All Alert parts accept standard HTML attributes and Tailwind classes. They have no additional component props.

## Basic Alert

```blade
<x-ux::alert>
    <x-ux::icon name="circle-check" />
    <x-ux::alert.title>Account updated successfully</x-ux::alert.title>
    <x-ux::alert.description>
        Your profile information has been saved.
    </x-ux::alert.description>
</x-ux::alert>
```

Use a concise title. Put supporting detail, links, paragraphs, or lists in Description.

## Destructive Alert

Use `variant="destructive"` for an error or failed operation, not merely for general emphasis.

```blade
<x-ux::alert variant="destructive">
    <x-ux::icon name="circle-alert" />
    <x-ux::alert.title>Payment failed</x-ux::alert.title>
    <x-ux::alert.description>
        Your payment could not be processed. Check your payment method and try again.
    </x-ux::alert.description>
</x-ux::alert>
```

## Action

Place a compact control in `x-ux::alert.action`. The Alert reserves inline-end space automatically.

```blade
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

Keep actions short. Prefer one action; multiple controls can collide with the message at narrow widths.

## Rich Description

Description supports paragraphs, links, and lists:

```blade
<x-ux::alert variant="destructive">
    <x-ux::icon name="circle-alert" />
    <x-ux::alert.title>Unable to process your payment.</x-ux::alert.title>
    <x-ux::alert.description>
        <p>Verify your <a href="/billing">billing information</a> and try again.</p>
        <ul class="list-inside list-disc">
            <li>Check your card details</li>
            <li>Ensure sufficient funds</li>
            <li>Verify the billing address</li>
        </ul>
    </x-ux::alert.description>
</x-ux::alert>
```

## Custom Colors

Override semantic colors only when the product already has a matching status palette:

```blade
<x-ux::alert class="border-amber-200 bg-amber-50 text-amber-900 dark:border-amber-900 dark:bg-amber-950 dark:text-amber-100">
    <x-ux::icon name="triangle-alert" />
    <x-ux::alert.title>Your subscription expires in 3 days.</x-ux::alert.title>
    <x-ux::alert.description class="text-amber-800 dark:text-amber-200">
        Renew now to avoid service interruption.
    </x-ux::alert.description>
</x-ux::alert>
```

## Livewire Usage

Render server validation or operation feedback conditionally. Provide a stable key if alerts may be replaced in the same location.

```blade
@if ($saved)
    <x-ux::alert wire:key="profile-saved">
        <x-ux::icon name="circle-check" />
        <x-ux::alert.title>Profile saved</x-ux::alert.title>
    </x-ux::alert>
@endif
```

Alert has no client state and needs no `wire:model` or Alpine plugin.

## Accessibility and RTL

- The root already renders `role="alert"`; do not add another live region around it.
- Use Alert for information important enough to be announced assertively. Use ordinary text for passive, persistent information.
- Keep visible text meaningful; never communicate status through color or icon alone.
- Decorative icons need no separate accessible label when Title or Description names the message.
- Action buttons must have visible text or an accessible label.
- Logical alignment and Action positioning respond to `dir="rtl"` on Alert or an ancestor.

## Avoid

- Do not use React names such as `AlertDescription` or `AlertAction`.
- Do not put message text directly in Action.
- Do not use `destructive` for success or neutral information.
- Do not add custom grid or absolute-positioning classes unless intentionally changing the component layout.
- Do not add JavaScript for a static Alert. Use a separate dismissible component when dismissal is required.
