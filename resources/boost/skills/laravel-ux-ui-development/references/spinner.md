# Spinner

Use `x-ux::spinner` to show an indeterminate loading state.

## Usage

```blade
<x-ux::spinner />
```

The component renders the Lucide `loader-circle` icon with `role="status"`, a translated `Loading` label, and
`size-4 animate-spin`.

## Customization

To use another icon, publish the component view and replace `loader-circle`.

## Size

Use a `size-*` utility to change the size:

```blade
<x-ux::spinner class="size-6" />
```

## Button

Place the spinner before the label with `data-icon="inline-start"` or after it with `data-icon="inline-end"`.

```blade
<x-ux::button disabled size="sm">
    <x-ux::spinner data-icon="inline-start" />
    Loading...
</x-ux::button>
```

## Badge

```blade
<x-ux::badge variant="secondary">
    <x-ux::spinner data-icon="inline-start" />
    Updating
</x-ux::badge>
```

## Input Group

```blade
<x-ux::input-group>
    <x-ux::input-group.input placeholder="Send a message..." disabled />
    <x-ux::input-group.addon align="inline-end">
        <x-ux::spinner />
    </x-ux::input-group.addon>
</x-ux::input-group>
```

## Empty

```blade
<x-ux::empty>
    <x-ux::empty.header>
        <x-ux::empty.media variant="icon">
            <x-ux::spinner />
        </x-ux::empty.media>
        <x-ux::empty.title>Processing your request</x-ux::empty.title>
        <x-ux::empty.description>
            Please wait while we process your request. Do not refresh the page.
        </x-ux::empty.description>
    </x-ux::empty.header>
</x-ux::empty>
```

## RTL

Wrap isolated right-to-left layouts with `x-ux::direction`.
