# Dialog

A window overlaid on either the primary window or another dialog window, rendering the content underneath inert.

```blade preview
<x-ux::dialog>
    <x-ux::dialog.trigger as-child>
        <x-ux::button variant="outline">Open Dialog</x-ux::button>
    </x-ux::dialog.trigger>
    <x-ux::dialog.content class="sm:max-w-[425px]">
        <x-ux::dialog.header>
            <x-ux::dialog.title>Edit profile</x-ux::dialog.title>
            <x-ux::dialog.description>
                Make changes to your profile here. Click save when you're done.
            </x-ux::dialog.description>
        </x-ux::dialog.header>
        <x-ux::field.group>
            <x-ux::field>
                <x-ux::field.label for="name-1">Name</x-ux::field.label>
                <x-ux::input id="name-1" name="name" value="Pedro Duarte" />
            </x-ux::field>
            <x-ux::field>
                <x-ux::field.label for="username-1">Username</x-ux::field.label>
                <x-ux::input id="username-1" name="username" value="@peduarte" />
            </x-ux::field>
        </x-ux::field.group>
        <x-ux::dialog.footer>
            <x-ux::dialog.close variant="outline">Cancel</x-ux::dialog.close>
            <x-ux::button type="submit">Save changes</x-ux::button>
        </x-ux::dialog.footer>
    </x-ux::dialog.content>
</x-ux::dialog>
```

## Usage

```blade
<x-ux::dialog>
    <x-ux::dialog.trigger as-child>
        <x-ux::button variant="outline">Open</x-ux::button>
    </x-ux::dialog.trigger>
    <x-ux::dialog.content>
        <x-ux::dialog.header>
            <x-ux::dialog.title>Are you absolutely sure?</x-ux::dialog.title>
            <x-ux::dialog.description>
                This action cannot be undone. This will permanently delete your account and remove your data from our servers.
            </x-ux::dialog.description>
        </x-ux::dialog.header>
    </x-ux::dialog.content>
</x-ux::dialog>
```

## Composition

```text
x-ux::dialog
├── x-ux::dialog.trigger
└── x-ux::dialog.content
    ├── x-ux::dialog.header
    │   ├── x-ux::dialog.title
    │   └── x-ux::dialog.description
    ├── Content
    ├── x-ux::dialog.footer
    └── x-ux::dialog.close
```

## Custom Close Button

Replace the default close control with your own button.

```blade preview
<x-ux::dialog>
    <x-ux::dialog.trigger as-child>
        <x-ux::button variant="outline">Share</x-ux::button>
    </x-ux::dialog.trigger>
    <x-ux::dialog.content :show-close-button="false">
        <x-ux::dialog.header>
            <x-ux::dialog.title>Share link</x-ux::dialog.title>
            <x-ux::dialog.description>
                Anyone who has this link will be able to view this.
            </x-ux::dialog.description>
        </x-ux::dialog.header>
        <div class="flex items-center gap-2">
            <x-ux::input value="https://ui.shadcn.com/docs/installation" readonly />
            <x-ux::dialog.close variant="outline" size="icon">
                <x-ux::icon name="copy" />
                <span class="sr-only">Copy</span>
            </x-ux::dialog.close>
        </div>
    </x-ux::dialog.content>
</x-ux::dialog>
```

## No Close Button

Use `show-close-button="false"` to hide the close button.

```blade preview
<x-ux::dialog>
    <x-ux::dialog.trigger as-child>
        <x-ux::button variant="outline">No Close Button</x-ux::button>
    </x-ux::dialog.trigger>
    <x-ux::dialog.content :show-close-button="false">
        <x-ux::dialog.header>
            <x-ux::dialog.title>No close button</x-ux::dialog.title>
            <x-ux::dialog.description>
                This dialog does not have a close button in the top-right corner.
            </x-ux::dialog.description>
        </x-ux::dialog.header>
    </x-ux::dialog.content>
</x-ux::dialog>
```

## Sticky Footer

Keep actions visible while the content scrolls.

```blade preview
<x-ux::dialog>
    <x-ux::dialog.trigger as-child>
        <x-ux::button variant="outline">Sticky Footer</x-ux::button>
    </x-ux::dialog.trigger>
    <x-ux::dialog.content>
        <x-ux::dialog.header>
            <x-ux::dialog.title>Terms of Service</x-ux::dialog.title>
            <x-ux::dialog.description>
                Please read the following terms carefully.
            </x-ux::dialog.description>
        </x-ux::dialog.header>
        <div class="-mx-4 no-scrollbar max-h-[50vh] overflow-y-auto px-4 text-sm">
            @foreach(range(1, 10) as $paragraph)
                <p class="mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            @endforeach
        </div>
        <x-ux::dialog.footer :show-close-button="true" />
    </x-ux::dialog.content>
</x-ux::dialog>
```

## Scrollable Content

Long content can scroll while the header stays in view.

```blade preview
<x-ux::dialog>
    <x-ux::dialog.trigger as-child>
        <x-ux::button variant="outline">Scrollable Content</x-ux::button>
    </x-ux::dialog.trigger>
    <x-ux::dialog.content>
        <x-ux::dialog.header>
            <x-ux::dialog.title>Scrollable Content</x-ux::dialog.title>
            <x-ux::dialog.description>
                This is a dialog with scrollable content.
            </x-ux::dialog.description>
        </x-ux::dialog.header>
        <div class="-mx-4 no-scrollbar max-h-[50vh] overflow-y-auto px-4">
            @foreach(range(1, 10) as $index)
                <p class="mb-4 leading-normal">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat
                    nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                    sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            @endforeach
        </div>
    </x-ux::dialog.content>
</x-ux::dialog>
```

## RTL

To enable RTL support in shadcn/ui, see the [RTL configuration guide](https://ui.shadcn.com/docs/rtl).

```blade preview
<x-ux::dialog>
    <form>
        <x-ux::dialog.trigger as-child>
            <x-ux::button variant="outline">فتح مربع الحوار</x-ux::button>
        </x-ux::dialog.trigger>
        <x-ux::dialog.content class="sm:max-w-sm" dir="rtl" data-lang="ar">
            <x-ux::dialog.header>
                <x-ux::dialog.title>تعديل الملف الشخصي</x-ux::dialog.title>
                <x-ux::dialog.description>
                    قم بإجراء تغييرات على ملفك الشخصي هنا. انقر فوق حفظ عند الانتهاء.
                </x-ux::dialog.description>
            </x-ux::dialog.header>
            <x-ux::field.group>
                <x-ux::field>
                    <x-ux::label for="name-rtl">الاسم</x-ux::label>
                    <x-ux::input id="name-rtl" name="name" value="Pedro Duarte" />
                </x-ux::field>
                <x-ux::field>
                    <x-ux::label for="username-rtl">اسم المستخدم</x-ux::label>
                    <x-ux::input id="username-rtl" name="username" value="@peduarte" />
                </x-ux::field>
            </x-ux::field.group>
            <x-ux::dialog.footer>
                <x-ux::dialog.close variant="outline">إلغاء</x-ux::dialog.close>
                <x-ux::button type="submit">حفظ التغييرات</x-ux::button>
            </x-ux::dialog.footer>
        </x-ux::dialog.content>
    </form>
</x-ux::dialog>
```

## API Reference

### `x-ux::dialog`

| Prop   | Type      | Default |
|--------|-----------|---------|
| `open` | `boolean` | `false` |

### `x-ux::dialog.trigger`

| Prop       | Type      | Default |
|------------|-----------|---------|
| `as-child` | `boolean` | `false` |

### `x-ux::dialog.content`

| Prop                | Type      | Default |
|---------------------|-----------|---------|
| `show-close-button` | `boolean` | `true`  |

### `x-ux::dialog.footer`

| Prop                | Type      | Default |
|---------------------|-----------|---------|
| `show-close-button` | `boolean` | `false` |

### `x-ux::dialog.close`

| Prop       | Type      | Default |
|------------|-----------|---------|
| `as-child` | `boolean` | `false` |

## Publishing

```shell
php artisan vendor:publish --tag=ux-dialog --force
```
