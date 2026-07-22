# Input Group

Add icons, text, buttons, and helper content to inputs.

```blade preview
<x-ux::input-group class="max-w-xs">
    <x-ux::input-group.input placeholder="Search packages..." />
    <x-ux::input-group.addon>
        <x-ux::icon name="search" />
    </x-ux::input-group.addon>
    <x-ux::input-group.addon align="inline-end">12 results</x-ux::input-group.addon>
</x-ux::input-group>
```

## Usage

```blade
<x-ux::input-group>
    <x-ux::input-group.input placeholder="Search..." />
    <x-ux::input-group.addon>
        <x-ux::icon name="search" />
    </x-ux::input-group.addon>
</x-ux::input-group>
```

## Composition

```text
x-ux::input-group
├── x-ux::input-group.input or x-ux::input-group.textarea
└── x-ux::input-group.addon
    ├── x-ux::input-group.button
    └── x-ux::input-group.text
```

Place x-ux::input-group.addon after the input or textarea in the markup. Use `align` to control its visual position.

## Align

### inline-start

```blade preview
<x-ux::field class="w-full max-w-sm">
    <x-ux::field.label for="group-inline-start">Package</x-ux::field.label>
    <x-ux::input-group>
        <x-ux::input-group.input id="group-inline-start" placeholder="Search packages..." />
        <x-ux::input-group.addon align="inline-start">
            <x-ux::icon name="search" />
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::field.description>The icon is positioned at the start.</x-ux::field.description>
</x-ux::field>
```

### inline-end

```blade preview
<x-ux::field class="w-full max-w-sm">
    <x-ux::field.label for="group-inline-end">Password</x-ux::field.label>
    <x-ux::input-group>
        <x-ux::input-group.input id="group-inline-end" type="password" placeholder="Enter password" />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::icon name="eye-off" />
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::field.description>The icon is positioned at the end.</x-ux::field.description>
</x-ux::field>
```

### block-start

```blade preview
<x-ux::field.group class="w-full max-w-sm">
    <x-ux::field>
        <x-ux::field.label for="group-block-start-input">Application</x-ux::field.label>
        <x-ux::input-group class="h-auto">
            <x-ux::input-group.input id="group-block-start-input" placeholder="Application name" />
            <x-ux::input-group.addon align="block-start">
                <x-ux::input-group.text>Laravel Application</x-ux::input-group.text>
            </x-ux::input-group.addon>
        </x-ux::input-group>
    </x-ux::field>
    <x-ux::field>
        <x-ux::field.label for="group-block-start-textarea">Blade template</x-ux::field.label>
        <x-ux::input-group>
            <x-ux::input-group.textarea id="group-block-start-textarea" placeholder="Write Blade markup..." class="font-mono" />
            <x-ux::input-group.addon align="block-start">
                <x-ux::icon name="file-code" />
                <x-ux::input-group.text class="font-mono">dashboard.blade.php</x-ux::input-group.text>
                <x-ux::input-group.button size="icon-xs" class="ms-auto" aria-label="Copy">
                    <x-ux::icon name="copy" />
                </x-ux::input-group.button>
            </x-ux::input-group.addon>
        </x-ux::input-group>
    </x-ux::field>
</x-ux::field.group>
```

### block-end

```blade preview
<x-ux::field.group class="w-full max-w-sm">
    <x-ux::field>
        <x-ux::field.label for="group-block-end-input">Budget</x-ux::field.label>
        <x-ux::input-group class="h-auto">
            <x-ux::input-group.input id="group-block-end-input" placeholder="Enter amount" />
            <x-ux::input-group.addon align="block-end">
                <x-ux::input-group.text>USD</x-ux::input-group.text>
            </x-ux::input-group.addon>
        </x-ux::input-group>
    </x-ux::field>
    <x-ux::field>
        <x-ux::field.label for="group-block-end-textarea">Comment</x-ux::field.label>
        <x-ux::input-group>
            <x-ux::input-group.textarea id="group-block-end-textarea" placeholder="Write a comment..." />
            <x-ux::input-group.addon align="block-end">
                <x-ux::input-group.text>0/280</x-ux::input-group.text>
                <x-ux::input-group.button variant="default" size="sm" class="ms-auto">Post</x-ux::input-group.button>
            </x-ux::input-group.addon>
        </x-ux::input-group>
    </x-ux::field>
</x-ux::field.group>
```

## Icon

```blade preview
<div class="grid w-full max-w-sm gap-4">
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Search documentation..." />
        <x-ux::input-group.addon><x-ux::icon name="search" /></x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.input type="email" placeholder="Enter your email" />
        <x-ux::input-group.addon><x-ux::icon name="mail" /></x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Card number" />
        <x-ux::input-group.addon><x-ux::icon name="credit-card" /></x-ux::input-group.addon>
        <x-ux::input-group.addon align="inline-end"><x-ux::icon name="check" /></x-ux::input-group.addon>
    </x-ux::input-group>
</div>
```

## Text

```blade preview
<div class="grid w-full max-w-sm gap-4">
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="0.00" />
        <x-ux::input-group.addon><x-ux::input-group.text>$</x-ux::input-group.text></x-ux::input-group.addon>
        <x-ux::input-group.addon align="inline-end"><x-ux::input-group.text>USD</x-ux::input-group.text></x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="laravel.com" class="ps-0.5!" />
        <x-ux::input-group.addon><x-ux::input-group.text>https://</x-ux::input-group.text></x-ux::input-group.addon>
        <x-ux::input-group.addon align="inline-end"><x-ux::input-group.text>/docs</x-ux::input-group.text></x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.textarea placeholder="Enter your message" />
        <x-ux::input-group.addon align="block-end"><x-ux::input-group.text class="text-xs">120 characters left</x-ux::input-group.text></x-ux::input-group.addon>
    </x-ux::input-group>
</div>
```

## Button

```blade preview
<div class="grid w-full max-w-sm gap-4">
    <x-ux::input-group>
        <x-ux::input-group.input value="https://laravel.com/docs" readonly />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::input-group.button size="icon-xs" aria-label="Copy"><x-ux::icon name="copy" /></x-ux::input-group.button>
        </x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Search packages..." />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::input-group.button variant="secondary">Search</x-ux::input-group.button>
        </x-ux::input-group.addon>
    </x-ux::input-group>
</div>
```

## Kbd

```blade preview
<x-ux::input-group class="max-w-sm">
    <x-ux::input-group.input placeholder="Search..." />
    <x-ux::input-group.addon><x-ux::icon name="search" /></x-ux::input-group.addon>
    <x-ux::input-group.addon align="inline-end"><x-ux::kbd>⌘K</x-ux::kbd></x-ux::input-group.addon>
</x-ux::input-group>
```

## Dropdown

```blade preview
<x-ux::input-group class="max-w-sm">
    <x-ux::input-group.input placeholder="Enter search query" />
    <x-ux::input-group.addon align="inline-end">
        <x-ux::dropdown-menu>
            <x-ux::dropdown-menu.trigger as-child>
                <x-ux::input-group.button class="pe-1.5! text-xs">
                    Search In... <x-ux::icon name="chevron-down" class="size-3" />
                </x-ux::input-group.button>
            </x-ux::dropdown-menu.trigger>
            <x-ux::dropdown-menu.content align="end" :side-offset="8">
                <x-ux::dropdown-menu.item>Documentation</x-ux::dropdown-menu.item>
                <x-ux::dropdown-menu.item>Packages</x-ux::dropdown-menu.item>
                <x-ux::dropdown-menu.item>Changelog</x-ux::dropdown-menu.item>
            </x-ux::dropdown-menu.content>
        </x-ux::dropdown-menu>
    </x-ux::input-group.addon>
</x-ux::input-group>
```

## Spinner

```blade preview
<div class="grid w-full max-w-sm gap-4">
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Searching..." />
        <x-ux::input-group.addon align="inline-end"><x-ux::spinner /></x-ux::input-group.addon>
    </x-ux::input-group>
    <x-ux::input-group>
        <x-ux::input-group.input placeholder="Saving changes..." />
        <x-ux::input-group.addon align="inline-end">
            <x-ux::input-group.text>Saving...</x-ux::input-group.text>
            <x-ux::spinner />
        </x-ux::input-group.addon>
    </x-ux::input-group>
</div>
```

## Textarea

```blade preview
<x-ux::input-group class="w-full max-w-md">
    <x-ux::input-group.textarea placeholder="Write Blade markup here..." class="min-h-48 font-mono" />
    <x-ux::input-group.addon align="block-start" class="border-b">
        <x-ux::icon name="file-code" />
        <x-ux::input-group.text class="font-mono">welcome.blade.php</x-ux::input-group.text>
        <x-ux::input-group.button size="icon-xs" class="ms-auto" aria-label="Copy"><x-ux::icon name="copy" /></x-ux::input-group.button>
    </x-ux::input-group.addon>
    <x-ux::input-group.addon align="block-end" class="border-t">
        <x-ux::input-group.text>Line 1, Column 1</x-ux::input-group.text>
        <x-ux::input-group.button size="sm" class="ms-auto" variant="default">
            Render <x-ux::icon name="corner-down-left" />
        </x-ux::input-group.button>
    </x-ux::input-group.addon>
</x-ux::input-group>
```

## Custom Input

Add `data-slot="input-group-control"` to a custom control so the group can reflect its focus and invalid states.

```blade preview
<x-ux::input-group class="max-w-sm">
    <x-ux::textarea
        data-slot="input-group-control"
        class="min-h-16 flex-1 resize-none rounded-none border-0 bg-transparent shadow-none focus-visible:ring-0"
        placeholder="Autosize with your Livewire or Alpine behavior..."
    />
    <x-ux::input-group.addon align="block-end">
        <x-ux::input-group.button class="ms-auto" size="sm" variant="default">Submit</x-ux::input-group.button>
    </x-ux::input-group.addon>
</x-ux::input-group>
```

## RTL

```blade preview
<x-ux::direction direction="rtl">
    <div class="grid w-full max-w-sm gap-4">
        <x-ux::input-group>
            <x-ux::input-group.input placeholder="بحث..." />
            <x-ux::input-group.addon><x-ux::icon name="search" /></x-ux::input-group.addon>
            <x-ux::input-group.addon align="inline-end">١٢ نتيجة</x-ux::input-group.addon>
        </x-ux::input-group>
        <x-ux::input-group>
            <x-ux::input-group.input placeholder="جاري حفظ التغييرات..." />
            <x-ux::input-group.addon align="inline-end">
                <x-ux::input-group.text>جاري الحفظ...</x-ux::input-group.text>
                <x-ux::spinner />
            </x-ux::input-group.addon>
        </x-ux::input-group>
        <x-ux::field>
            <x-ux::field.label for="input-group-rtl-comment">منطقة النص</x-ux::field.label>
            <x-ux::input-group>
                <x-ux::input-group.textarea id="input-group-rtl-comment" placeholder="اكتب تعليقًا..." />
                <x-ux::input-group.addon align="block-end">
                    <x-ux::input-group.text>٠/٢٨٠</x-ux::input-group.text>
                    <x-ux::input-group.button variant="default" size="sm" class="ms-auto">نشر</x-ux::input-group.button>
                </x-ux::input-group.addon>
            </x-ux::input-group>
        </x-ux::field>
    </div>
</x-ux::direction>
```

## API Reference

### x-ux::input-group.addon

| Prop    | Type                                                                     | Default          |
|---------|--------------------------------------------------------------------------|------------------|
| `align` | `enum` [?"inline-start" \| "inline-end" \| "block-start" \| "block-end"] | `"inline-start"` |

### x-ux::input-group.button

| Prop      | Type                                                                                  | Default   |
|-----------|---------------------------------------------------------------------------------------|-----------|
| `size`    | `enum` [?"xs" \| "icon-xs" \| "sm" \| "icon-sm"]                                      | `"xs"`    |
| `variant` | `enum` [?"default" \| "secondary" \| "destructive" \| "outline" \| "ghost" \| "link"] | `"ghost"` |

## Publishing

```shell
php artisan vendor:publish --tag=ux-input-group --force
```
