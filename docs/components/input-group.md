# Input Group

Display additional information or actions to an input or textarea.

```blade preview
<div class="grid w-full max-w-sm gap-6">
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Search..." />
        <x-ux::input-group.addon>
            <x-ux::icon name="search" />
        </x-ux::input-group.addon>
        <x-ux::input-group.addon align="inline-end">12 results</x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="example.com" class="!pl-1" />
        <x-ux::input-group.addon>
            <x-ux::input-group.text>https://</x-ux::input-group.text>
        </x-ux::input-group.addon>
        <x-ux::input-group.addon align="inline-end">
            <x-ux::tooltip>
                <x-ux::tooltip.trigger as-child>
                    <x-ux::input-group.button class="rounded-full" size="icon-xs">
                        <x-ux::icon name="info" />
                    </x-ux::input-group.button>
                </x-ux::tooltip.trigger>
                <x-ux::tooltip.content>This is content in a tooltip.</x-ux::tooltip.content>
            </x-ux::tooltip>
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.textarea placeholder="Ask, Search or Chat..." />
        <x-ux::input-group.addon align="block-end">
            <x-ux::input-group.button
                variant="outline"
                class="rounded-full"
                size="icon-xs"
            >
                <x-ux::icon name="plus" />
            </x-ux::input-group.button>
            <x-ux::dropdown-menu>
                <x-ux::dropdown-menu.trigger as-child>
                    <x-ux::input-group.button variant="ghost">Auto</x-ux::input-group.button>
                </x-ux::dropdown-menu.trigger>
                <x-ux::dropdown-menu.content
                    side="top"
                    align="start"
                    class="[--radius:0.95rem]"
                >
                    <x-ux::dropdown-menu.item>Auto</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>Agent</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>Manual</x-ux::dropdown-menu.item>
                </x-ux::dropdown-menu.content>
            </x-ux::dropdown-menu>
            <x-ux::input-group.text class="ml-auto">52% used</x-ux::input-group.text>
            <x-ux::separator orientation="vertical" class="!h-4" />
            <x-ux::input-group.button
                variant="default"
                class="rounded-full"
                size="icon-xs"
                disabled
            >
                <x-ux::icon name="arrow-up" />
                <span class="sr-only">Send</span>
            </x-ux::input-group.button>
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="@shadcn" />
        <x-ux::input-group.addon align="inline-end">
            <div class="bg-primary text-primary-foreground flex size-4 items-center justify-center rounded-full">
                <x-ux::icon name="check" class="size-3" />
            </div>
        </x-ux::input-group.addon>
    </x-ux::input-group>
</div>
```

## Usage

```blade
<x-ux::input-group>
    <x-ux::input-group.input placeholder="Search..." />
    <x-ux::input-group.addon>
        <x-ux::icon name="search" />
    </x-ux::input-group.addon>
    <x-ux::input-group.addon align="inline-end">
        <x-ux::input-group.button>Search</x-ux::input-group.button>
    </x-ux::input-group.addon>
</x-ux::input-group>
```

## Examples

### Icon

```blade preview
<div class="grid w-full max-w-sm gap-6">
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Search..." />
        <x-ux::input-group.addon>
            <x-ux::icon name="search" />
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.input type="email" placeholder="Enter your email" />
        <x-ux::input-group.addon>
            <x-ux::icon name="mail" />
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Card number" />
        <x-ux::input-group.addon>
            <x-ux::icon name="credit-card" />
        </x-ux::input-group.addon>
        <x-ux::input-group.addon align="inline-end">
            <x-ux::icon name="check" />
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Card number" />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::icon name="star" />
            <x-ux::icon name="info" />
        </x-ux::input-group.addon>
    </x-ux::input-group>
</div>
```

### Text

Display additional text information alongside inputs.

```blade preview
<div class="grid w-full max-w-sm gap-6">
    <x-ux::input-group>
        <x-ux::input-group.addon>
            <x-ux::input-group.text>$</x-ux::input-group.text>
        </x-ux::input-group.addon>
        <x-ux::input-group.input placeholder="0.00" />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::input-group.text>USD</x-ux::input-group.text>
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.addon>
            <x-ux::input-group.text>https://</x-ux::input-group.text>
        </x-ux::input-group.addon>
        <x-ux::input-group.input placeholder="example.com" class="!pl-0.5" />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::input-group.text>.com</x-ux::input-group.text>
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Enter your username" />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::input-group.text>@company.com</x-ux::input-group.text>
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.textarea placeholder="Enter your message" />
        <x-ux::input-group.addon align="block-end">
            <x-ux::input-group.text class="text-muted-foreground text-xs">
                120 characters left
            </x-ux::input-group.text>
        </x-ux::input-group.addon>
    </x-ux::input-group>
</div>
```

### Button

Add buttons to perform actions within the input group.

```blade preview
<div class="grid w-full max-w-sm gap-6">
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="https://x.com/shadcn" readOnly />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::input-group.button
                aria-label="Copy"
                title="Copy"
                size="icon-xs"
            >
                <x-ux::icon name="copy" />
            </x-ux::input-group.button>
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group class="[--radius:9999px]">
        <x-ux::popover>
            <x-ux::popover.trigger as-child>
                <x-ux::input-group.addon>
                    <x-ux::input-group.button variant="secondary" size="icon-xs">
                        <x-ux::icon name="info" />
                    </x-ux::input-group.button>
                </x-ux::input-group.addon>
            </x-ux::popover.trigger>
            <x-ux::popover.content
                align="start"
                class="flex flex-col gap-1 rounded-xl text-sm"
            >
                <p class="font-medium">Your connection is not secure.</p>
                <p>You should not enter any sensitive information on this site.</p>
            </x-ux::popover.content>
        </x-ux::popover>
        <x-ux::input-group.addon class="text-muted-foreground pl-1.5">
            https://
        </x-ux::input-group.addon>
        <x-ux::input-group.input id="input-secure-19" />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::input-group.button size="icon-xs">
                <x-ux::icon name="star" />
            </x-ux::input-group.button>
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Type to search..." />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::input-group.button variant="secondary">Search</x-ux::input-group.button>
        </x-ux::input-group.addon>
    </x-ux::input-group>
</div>
```

### Tooltip

Add tooltips to provide additional context or help.

```blade preview
<div class="grid w-full max-w-sm gap-4">
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Enter password" type="password" />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::tooltip>
                <x-ux::tooltip.trigger as-child>
                    <x-ux::input-group.button
                        variant="ghost"
                        aria-label="Info"
                        size="icon-xs"
                    >
                        <x-ux::icon name="info" />
                    </x-ux::input-group.button>
                </x-ux::tooltip.trigger>
                <x-ux::tooltip.content>
                    <p>Password must be at least 8 characters</p>
                </x-ux::tooltip.content>
            </x-ux::tooltip>
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Your email address" />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::tooltip>
                <x-ux::tooltip.trigger as-child>
                    <x-ux::input-group.button
                        variant="ghost"
                        aria-label="Help"
                        size="icon-xs"
                    >
                        <x-ux::icon name="circle-question-mark" />
                    </x-ux::input-group.button>
                </x-ux::tooltip.trigger>
                <x-ux::tooltip.content>
                    <p>We'll use this to send you notifications</p>
                </x-ux::tooltip.content>
            </x-ux::tooltip>
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Enter API key" />
        <x-ux::tooltip>
            <x-ux::tooltip.trigger as-child>
                <x-ux::input-group.addon>
                    <x-ux::input-group.button
                        variant="ghost"
                        aria-label="Help"
                        size="icon-xs"
                    >
                        <x-ux::icon name="circle-question-mark" />
                    </x-ux::input-group.button>
                </x-ux::input-group.addon>
            </x-ux::tooltip.trigger>
            <x-ux::tooltip.content side="left">
                <p>Click for help with API keys</p>
            </x-ux::tooltip.content>
        </x-ux::tooltip>
    </x-ux::input-group>
</div>
```

### Textarea

Input groups also work with textarea components. Use `block-start` or `block-end` for alignment.

```blade preview
<div class="grid w-full max-w-md gap-4">
    <x-ux::input-group>
        <x-ux::input-group.textarea
            id="textarea-code-32"
            placeholder="console.log('Hello, world!');"
            class="min-h-[200px]"
        />
        <x-ux::input-group.addon align="block-end" class="border-t">
            <x-ux::input-group.text>Line 1, Column 1</x-ux::input-group.text>
            <x-ux::input-group.button size="sm" class="ml-auto" variant="default">
                Run <x-ux::icon name="corner-down-left" />
            </x-ux::input-group.button>
        </x-ux::input-group.addon>
        <x-ux::input-group.addon align="block-start" class="border-b">
            <x-ux::input-group.text class="font-mono font-medium">
                <x-ux::icon name="code" />
                script.js
            </x-ux::input-group.text>
            <x-ux::input-group.button class="ml-auto" size="icon-xs">
                <x-ux::icon name="refresh-ccw" />
            </x-ux::input-group.button>
            <x-ux::input-group.button variant="ghost" size="icon-xs">
                <x-ux::icon name="copy" />
            </x-ux::input-group.button>
        </x-ux::input-group.addon>
    </x-ux::input-group>
</div>
```

### Spinner

Show loading indicators while processing input.

```blade preview
<div class="grid w-full max-w-sm gap-4">
    <x-ux::input-group data-disabled>
        <x-ux::input-group.input placeholder="Searching..." disabled />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::spinner />
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group data-disabled>
        <x-ux::input-group.input placeholder="Processing..." disabled />
        <x-ux::input-group.addon>
            <x-ux::spinner />
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group data-disabled>
        <x-ux::input-group.input placeholder="Saving changes..." disabled />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::input-group.text>Saving...</x-ux::input-group.text>
            <x-ux::spinner />
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group data-disabled>
        <x-ux::input-group.input placeholder="Refreshing data..." disabled />
        <x-ux::input-group.addon>
            <x-ux::spinner />
        </x-ux::input-group.addon>
        <x-ux::input-group.addon align="inline-end">
            <x-ux::input-group.text class="text-muted-foreground">
                Please wait...
            </x-ux::input-group.text>
        </x-ux::input-group.addon>
    </x-ux::input-group>
</div>
```

### Label

Add labels within input groups to improve accessibility.

```blade preview
<div class="grid w-full max-w-sm gap-4">
    <x-ux::input-group>
        <x-ux::input-group.input id="email" placeholder="shadcn" />
        <x-ux::input-group.addon>
            <x-ux::label for="email">@</x-ux::label>
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.input id="email-2" placeholder="shadcn@vercel.com" />
        <x-ux::input-group.addon align="block-start">
            <x-ux::label for="email-2" class="text-foreground">
                Email
            </x-ux::label>
            <x-ux::tooltip>
                <x-ux::tooltip.trigger as-child>
                    <x-ux::input-group.button
                        variant="ghost"
                        aria-label="Help"
                        class="ml-auto rounded-full"
                        size="icon-xs"
                    >
                        <x-ux::icon name="info" />
                    </x-ux::input-group.button>
                </x-ux::tooltip.trigger>
                <x-ux::tooltip.content>
                    <p>We'll use this to send you notifications</p>
                </x-ux::tooltip.content>
            </x-ux::tooltip>
        </x-ux::input-group.addon>
    </x-ux::input-group>
</div>
```

### Dropdown

Pair input groups with dropdown menus for complex interactions.

```blade preview
<div class="grid w-full max-w-sm gap-4">
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Enter file name" />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::dropdown-menu>
                <x-ux::dropdown-menu.trigger as-child>
                    <x-ux::input-group.button
                        variant="ghost"
                        aria-label="More"
                        size="icon-xs"
                    >
                        <x-ux::icon name="ellipsis" />
                    </x-ux::input-group.button>
                </x-ux::dropdown-menu.trigger>
                <x-ux::dropdown-menu.content align="end">
                    <x-ux::dropdown-menu.item>Settings</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>Copy path</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>Open location</x-ux::dropdown-menu.item>
                </x-ux::dropdown-menu.content>
            </x-ux::dropdown-menu>
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group class="[--radius:1rem]">
        <x-ux::input-group.input placeholder="Enter search query" />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::dropdown-menu>
                <x-ux::dropdown-menu.trigger as-child>
                    <x-ux::input-group.button variant="ghost" class="!pr-1.5 text-xs">
                        Search In...
                        <x-ux::icon name="chevron-down" class="size-3" />
                    </x-ux::input-group.button>
                </x-ux::dropdown-menu.trigger>
                <x-ux::dropdown-menu.content align="end" class="[--radius:0.95rem]">
                    <x-ux::dropdown-menu.item>Documentation</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>Blog Posts</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>Changelog</x-ux::dropdown-menu.item>
                </x-ux::dropdown-menu.content>
            </x-ux::dropdown-menu>
        </x-ux::input-group.addon>
    </x-ux::input-group>
</div>
```

### Button Group

Wrap input groups with button groups to create prefixes and suffixes.

```blade preview
<div class="grid w-full max-w-sm gap-6">
    <x-ux::button-group>
        <x-ux::button-group.text as-child>
            <x-ux::label for="url">https://</x-ux::label>
        </x-ux::button-group.text>
        <x-ux::input-group>
            <x-ux::input-group.input id="url" />
            <x-ux::input-group.addon align="inline-end">
                <x-ux::icon name="link-2" />
            </x-ux::input-group.addon>
        </x-ux::input-group>
        <x-ux::button-group.text>.com</x-ux::button-group.text>
    </x-ux::button-group>
</div>
```

## API Reference

### Addon

Displays icons, text, buttons, or other content alongside inputs.

| Prop    | Type                                                                     | Default          |
|---------|--------------------------------------------------------------------------|------------------|
| `align` | `enum` [?"inline-start" \| "inline-end" \| "block-start" \| "block-end"] | `"inline-start"` |

### Button

Displays buttons within input groups.

| Prop      | Type                                                                                  | Default   |
|-----------|---------------------------------------------------------------------------------------|-----------|
| `size`    | `enum` [?"xs" \| "icon-xs" \| "sm" \| "icon-sm"]                                      | `"xs"`    |
| `variant` | `enum` [?"default" \| "secondary" \| "destructive" \| "outline" \| "ghost" \| "link"] | `"ghost"` |


## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-input-group --force
```
