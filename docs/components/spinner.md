# Spinner

An indicator that can be used to show a loading state.

```blade preview
<div class="flex w-full max-w-xs flex-col gap-4 [--radius:1rem]">
    <x-ux::item variant="muted">
        <x-ux::item.media>
            <x-ux::spinner />
        </x-ux::item.media>
        <x-ux::item.content>
            <x-ux::item.title class="line-clamp-1">Processing payment...</x-ux::item.title>
        </x-ux::item.content>
        <x-ux::item.content class="flex-none justify-end">
            <span class="text-sm tabular-nums">$100.00</span>
        </x-ux::item.content>
    </x-ux::item>
</div>
```

## Usage

```blade
<x-ux::spinner />
```

## Examples

### Size

Use the `size-*` utility class to change the size of the spinner.

```blade preview
<div class="flex items-center gap-6">
    <x-ux::spinner class="size-3" />
    <x-ux::spinner class="size-4" />
    <x-ux::spinner class="size-6" />
    <x-ux::spinner class="size-8" />
</div>
```

### Color

Use the `text-*` utility class to change the color of the spinner.

```blade preview
<div class="flex items-center gap-6">
    <x-ux::spinner class="size-6 text-red-500" />
    <x-ux::spinner class="size-6 text-green-500" />
    <x-ux::spinner class="size-6 text-blue-500" />
    <x-ux::spinner class="size-6 text-yellow-500" />
    <x-ux::spinner class="size-6 text-purple-500" />
</div>
```

### Button

Add a spinner to a button to indicate a loading state.
The `<x-ux::button>` will handle the spacing between the spinner and the text.

```blade preview
<div class="flex items-center gap-4">
    <x-ux::button disabled size="sm">
        <x-ux::spinner />
        Loading...
    </x-ux::button>
    <x-ux::button variant="outline" disabled size="sm">
        <x-ux::spinner />
        Please wait
    </x-ux::button>
    <x-ux::button variant="secondary" disabled size="sm">
        <x-ux::spinner />
        Processing
    </x-ux::button>
</div>
```

### Badge

You can also use a spinner inside a badge.

```blade preview
<div class="flex items-center gap-4 [--radius:1.2rem]">
    <x-ux::badge>
        <x-ux::spinner />
        Syncing
    </x-ux::badge>
    <x-ux::badge variant="secondary">
        <x-ux::spinner />
        Updating
    </x-ux::badge>
    <x-ux::badge variant="outline">
        <x-ux::spinner />
        Processing
    </x-ux::badge>
</div>
```

### Input Group

Input Group can have spinners inside `<x-ux::input-group.addon>`.

```blade preview
<div class="flex w-full max-w-md flex-col gap-4">
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Send a message..." disabled />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::spinner />
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.textarea placeholder="Send a message..." disabled />
        <x-ux::input-group.addon align="block-end">
            <x-ux::spinner /> Validating...
            <x-ux::input-group.button class="ml-auto" variant="default">
                <x-ux::icon name="arrow-up" />
                <span class="sr-only">Send</span>
            </x-ux::input-group.button>
        </x-ux::input-group.addon>
    </x-ux::input-group>
</div>
```

### Empty

```blade preview
<x-ux::empty class="w-full">
    <x-ux::empty.header>
        <x-ux::empty.media variant="icon">
            <x-ux::spinner />
        </x-ux::empty.media>
        <x-ux::empty.title>Processing your request</x-ux::empty.title>
        <x-ux::empty.description>
            Please wait while we process your request. Do not refresh the page.
        </x-ux::empty.description>
    </x-ux::empty.header>
    <x-ux::empty.content>
        <x-ux::button variant="outline" size="sm">
            Cancel
        </x-ux::button>
    </x-ux::empty.content>
</x-ux::empty>
```

### Item

Use the spinner inside `<x-ux::item.media>` to indicate a loading state.

```blade preview
<div class="flex w-full max-w-md flex-col gap-4 [--radius:1rem]">
    <x-ux::item variant="outline">
        <x-ux::item.media variant="icon">
            <x-ux::spinner />
        </x-ux::item.media>
        <x-ux::item.content>
            <x-ux::item.title>Downloading...</x-ux::item.title>
            <x-ux::item.description>129 MB / 1000 MB</x-ux::item.description>
        </x-ux::item.content>
        <x-ux::item.actions class="hidden sm:flex">
            <x-ux::button variant="outline" size="sm">
                Cancel
            </x-ux::button>
        </x-ux::item.actions>
        <x-ux::item.footer>
            <x-ux::progress :value=75 />
        </x-ux::item.footer>
    </x-ux::item>
</div>
```

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-spinner --force
```
