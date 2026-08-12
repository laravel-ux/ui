# Introduction

A component system for Blade and Livewire based on [shadcn/ui](https://ui.shadcn.com/), built for polished Laravel
interfaces.

```blade preview
<x-ux::card class="w-full max-w-md">
    <x-ux::card.header>
        <x-ux::card.title>Create project</x-ux::card.title>
        <x-ux::card.description>
            Start with a name. You can invite the team later.
        </x-ux::card.description>
    </x-ux::card.header>
    <x-ux::card.content>
        <x-ux::field>
            <x-ux::field.label for="project-name">Project name</x-ux::field.label>
            <x-ux::input id="project-name" placeholder="Customer portal" />
        </x-ux::field>
    </x-ux::card.content>
    <x-ux::card.footer class="justify-end">
        <x-ux::button variant="outline">Cancel</x-ux::button>
        <x-ux::button>Create project</x-ux::button>
    </x-ux::card.footer>
</x-ux::card>
```

## Built for Laravel

Components use Blade composition, forwarded attributes, and Laravel conventions instead of React syntax or copied
client-side markup. Use them in ordinary Blade templates or bind them directly to Livewire state.

## Own the markup

Laravel UX UI provides thoughtful defaults without hiding the rendered structure. Components can be composed,
styled with Tailwind utilities, and published when a product needs deeper customization.

## One component language

The `x-ux::` namespace covers small primitives such as Button and Badge, form controls, overlays, navigation, data
display, and higher-level interface patterns. The same conventions apply across the full package:

- Literal values use regular Blade attributes.
- PHP values use bound attributes such as `:value="$status"`.
- Additional classes are merged through Tailwind Merge.
- Compound components use dot notation, such as `x-ux::dialog.trigger`.
- Interactive state integrates with Livewire and the components' built-in Alpine behavior.

## Agent-ready

The package includes a Laravel Boost skill with component references, composition rules, and package-specific
guidance for supported AI coding agents.
