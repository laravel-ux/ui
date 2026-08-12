# Livewire

Laravel UX UI components can bind directly to Livewire properties through forwarded `wire:*` attributes.

```blade
<x-ux::input wire:model.live="search" placeholder="Search projects..." />
```

## Form state

Use the same property types that the component value represents.

```php
public string $name = '';

public bool $notifications = true;

public string $role = 'member';
```

```blade
<x-ux::field>
    <x-ux::field.label for="name">Name</x-ux::field.label>
    <x-ux::input id="name" wire:model="name" />
</x-ux::field>

<x-ux::field orientation="horizontal">
    <x-ux::field.content>
        <x-ux::field.label for="notifications">Notifications</x-ux::field.label>
    </x-ux::field.content>
    <x-ux::switch id="notifications" wire:model="notifications" />
</x-ux::field>
```

## Validation

Render validation feedback through the Field composition so labels, descriptions, controls, and errors remain
associated.

```blade
<x-ux::field :data-invalid="$errors->has('email')">
    <x-ux::field.label for="email">Email address</x-ux::field.label>
    <x-ux::input
        id="email"
        type="email"
        wire:model.blur="email"
        :aria-invalid="$errors->has('email')"
    />
    <x-ux::field.error :errors="$errors->get('email')" />
</x-ux::field>
```

## Stable values

Components such as Tabs, Select, Radio Group, and Accordion use values to identify state. Keep those values stable
and unique, especially inside loops.

```blade
@foreach($projects as $project)
    <x-ux::select.item
        :value="$project->id"
        wire:key="project-option-{{ $project->id }}"
    >
        {{ $project->name }}
    </x-ux::select.item>
@endforeach
```

## Built-in client behavior

Do not duplicate a component's internal Alpine state with custom JavaScript. Add application-owned state only when
the component documentation explicitly requires it.
