# Using Components

Laravel UX UI components are available through the `x-ux::` Blade namespace.

```blade
<x-ux::button>Save changes</x-ux::button>
```

## Composition

Compound components use dot notation so their structure remains visible in the template.

```blade preview
<x-ux::card class="w-full max-w-md">
    <x-ux::card.header>
        <x-ux::card.title>Team workspace</x-ux::card.title>
        <x-ux::card.description>Manage the people who can access this project.</x-ux::card.description>
    </x-ux::card.header>
    <x-ux::card.content>
        <p class="text-sm text-muted-foreground">12 active members</p>
    </x-ux::card.content>
</x-ux::card>
```

Follow the composition documented on each component page. This preserves built-in state, keyboard behavior, and
accessibility attributes.

## Props

Use plain attributes for literal strings and bound attributes for PHP expressions, arrays, numbers, and booleans.

```blade
<x-ux::badge variant="secondary">Draft</x-ux::badge>
<x-ux::progress :value="$completion" />
<x-ux::tabs :value="$activeTab" />
```

## Attributes

Standard HTML and Alpine or Livewire attributes are forwarded to the component's root element.

```blade
<x-ux::input
    id="email"
    type="email"
    autocomplete="email"
    wire:model.blur="email"
/>
```

## Classes

Pass layout-specific Tailwind utilities through `class`. Components merge conflicting utilities so application
styles can override package defaults predictably.

```blade
<x-ux::button class="w-full sm:w-auto">
    Continue
</x-ux::button>
```

## Slots

Visible content belongs in the component slot. Named subcomponents expose more complex structure without requiring
custom selectors.

```blade
<x-ux::alert>
    <x-ux::alert.title>Payment received</x-ux::alert.title>
    <x-ux::alert.description>Your invoice is now marked as paid.</x-ux::alert.description>
</x-ux::alert>
```
