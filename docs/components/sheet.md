# Sheet

Extends the Dialog component to display content that complements the main content of the screen.

```blade preview
<x-ux::sheet>
    <x-ux::sheet.trigger as-child>
        <x-ux::button variant="outline">Open</x-ux::button>
    </x-ux::sheet.trigger>
    <x-ux::sheet.content>
        <x-ux::sheet.header>
            <x-ux::sheet.title>Edit profile</x-ux::sheet.title>
            <x-ux::sheet.description>
                Make changes to your profile here. Click save when you're done.
            </x-ux::sheet.description>
        </x-ux::sheet.header>
        <div class="grid flex-1 auto-rows-min gap-6 px-4">
            <div class="grid gap-3">
                <x-ux::label for="sheet-demo-name">Name</x-ux::label>
                <x-ux::input id="sheet-demo-name" value="Pedro Duarte" />
            </div>
            <div class="grid gap-3">
                <x-ux::label for="sheet-demo-username">Username</x-ux::label>
                <x-ux::input id="sheet-demo-username" value="@peduarte" />
            </div>
        </div>
        <x-ux::sheet.footer>
            <x-ux::button type="submit">Save changes</x-ux::button>
            <x-ux::sheet.close as-child>
                <x-ux::button variant="outline">Close</x-ux::button>
            </x-ux::sheet.close>
        </x-ux::sheet.footer>
    </x-ux::sheet.content>
</x-ux::sheet>
```

## Usage

```blade
<x-ux::sheet>
    <x-ux::sheet.trigger as-child>
        <x-ux::button variant="outline">Open</x-ux::button>
    </x-ux::sheet.trigger>
    <x-ux::sheet.content>
        <x-ux::sheet.header>
            <x-ux::sheet.title>Are you absolutely sure?</x-ux::sheet.title>
            <x-ux::sheet.description>
                This action cannot be undone. This will permanently delete your account and remove your data from our servers.
            </x-ux::sheet.description>
        </x-ux::sheet.header>
    </x-ux::sheet.content>
</x-ux::sheet>
```

## Composition

```text
x-ux::sheet
├── x-ux::sheet.trigger
└── x-ux::sheet.content
    ├── x-ux::sheet.header
    │   ├── x-ux::sheet.title
    │   └── x-ux::sheet.description
    ├── Content
    ├── x-ux::sheet.footer
    └── x-ux::sheet.close
```

## Side

Use the `side` prop to control where the sheet enters from.

```blade preview
<div class="flex flex-wrap gap-2">
    @foreach (['top', 'right', 'bottom', 'left'] as $side)
        <x-ux::sheet>
            <x-ux::sheet.trigger as-child>
                <x-ux::button variant="outline" class="capitalize">{{ $side }}</x-ux::button>
            </x-ux::sheet.trigger>
            <x-ux::sheet.content
                :side="$side"
                class="data-[side=bottom]:max-h-[50vh] data-[side=top]:max-h-[50vh]"
            >
                <x-ux::sheet.header>
                    <x-ux::sheet.title>Edit profile</x-ux::sheet.title>
                    <x-ux::sheet.description>
                        Make changes to your profile here. Click save when you're done.
                    </x-ux::sheet.description>
                </x-ux::sheet.header>
                <div class="no-scrollbar overflow-y-auto px-4">
                    @foreach (range(1, 10) as $index)
                        <p class="mb-2 leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    @endforeach
                </div>
                <x-ux::sheet.footer>
                    <x-ux::button type="submit">Save changes</x-ux::button>
                    <x-ux::sheet.close as-child>
                        <x-ux::button variant="outline">Cancel</x-ux::button>
                    </x-ux::sheet.close>
                </x-ux::sheet.footer>
            </x-ux::sheet.content>
        </x-ux::sheet>
    @endforeach
</div>
```

## No Close Button

Use `show-close-button="false"` to hide the close button in the top-right corner.

```blade preview
<x-ux::sheet>
    <x-ux::sheet.trigger as-child>
        <x-ux::button variant="outline">Open Sheet</x-ux::button>
    </x-ux::sheet.trigger>
    <x-ux::sheet.content :show-close-button="false">
        <x-ux::sheet.header>
            <x-ux::sheet.title>No Close Button</x-ux::sheet.title>
            <x-ux::sheet.description>
                This sheet doesn&apos;t have a close button in the top-right corner. Click outside to close.
            </x-ux::sheet.description>
        </x-ux::sheet.header>
    </x-ux::sheet.content>
</x-ux::sheet>
```

## RTL

Wrap isolated right-to-left sheets with `x-ux::direction`.

```blade preview
<x-ux::direction direction="rtl">
    <x-ux::sheet>
        <x-ux::sheet.trigger as-child>
            <x-ux::button variant="outline">فتح</x-ux::button>
        </x-ux::sheet.trigger>
        <x-ux::sheet.content side="left" data-lang="ar">
            <x-ux::sheet.header>
                <x-ux::sheet.title>تعديل الملف الشخصي</x-ux::sheet.title>
                <x-ux::sheet.description>
                    قم بإجراء تغييرات على ملفك الشخصي هنا. انقر فوق حفظ عند الانتهاء.
                </x-ux::sheet.description>
            </x-ux::sheet.header>
            <div class="grid flex-1 auto-rows-min gap-6 px-4">
                <div class="grid gap-3">
                    <x-ux::label for="sheet-rtl-name">الاسم</x-ux::label>
                    <x-ux::input id="sheet-rtl-name" value="Pedro Duarte" />
                </div>
                <div class="grid gap-3">
                    <x-ux::label for="sheet-rtl-username">اسم المستخدم</x-ux::label>
                    <x-ux::input id="sheet-rtl-username" value="@peduarte" />
                </div>
            </div>
            <x-ux::sheet.footer>
                <x-ux::button type="submit">حفظ التغييرات</x-ux::button>
                <x-ux::sheet.close as-child>
                    <x-ux::button variant="outline">إلغاء</x-ux::button>
                </x-ux::sheet.close>
            </x-ux::sheet.footer>
        </x-ux::sheet.content>
    </x-ux::sheet>
</x-ux::direction>
```

## API Reference

### `x-ux::sheet.content`

| Prop                | Type                                              | Default   |
|---------------------|---------------------------------------------------|-----------|
| `side`              | `enum` [?"top" \| "right" \| "bottom" \| "left"] | `"right"` |
| `show-close-button` | `boolean`                                         | `true`    |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-sheet --force
```
