# Dropdown Menu

Displays a menu to the user — such as a set of actions or functions — triggered by a button.

```blade preview
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger as-child>
        <x-ux::button variant="outline">Open</x-ux::button>
    </x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content class="w-40" align="start">
        <x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.label>My Account</x-ux::dropdown-menu.label>
            <x-ux::dropdown-menu.item>Profile <x-ux::dropdown-menu.shortcut>⇧⌘P</x-ux::dropdown-menu.shortcut></x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item>Billing <x-ux::dropdown-menu.shortcut>⌘B</x-ux::dropdown-menu.shortcut></x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item>Settings <x-ux::dropdown-menu.shortcut>⌘S</x-ux::dropdown-menu.shortcut></x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.group>
        <x-ux::dropdown-menu.separator />
        <x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.item>Team</x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.sub>
                <x-ux::dropdown-menu.sub.trigger>Invite users</x-ux::dropdown-menu.sub.trigger>
                <x-ux::dropdown-menu.sub.content>
                    <x-ux::dropdown-menu.item>Email</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>Message</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.separator />
                    <x-ux::dropdown-menu.item>More...</x-ux::dropdown-menu.item>
                </x-ux::dropdown-menu.sub.content>
            </x-ux::dropdown-menu.sub>
            <x-ux::dropdown-menu.item>New Team <x-ux::dropdown-menu.shortcut>⌘+T</x-ux::dropdown-menu.shortcut></x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.group>
        <x-ux::dropdown-menu.separator />
        <x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.item>GitHub</x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item>Support</x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item disabled>API</x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.group>
        <x-ux::dropdown-menu.separator />
        <x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.item>Log out <x-ux::dropdown-menu.shortcut>⇧⌘Q</x-ux::dropdown-menu.shortcut></x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.group>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

## Usage

```blade
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger as-child>
        <x-ux::button variant="outline">Open</x-ux::button>
    </x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content>
        <x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.label>My Account</x-ux::dropdown-menu.label>
            <x-ux::dropdown-menu.item>Profile</x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item>Billing</x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.group>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

## Composition

```text
x-ux::dropdown-menu
├── x-ux::dropdown-menu.trigger
└── x-ux::dropdown-menu.content
    ├── x-ux::dropdown-menu.group
    │   ├── x-ux::dropdown-menu.label
    │   ├── x-ux::dropdown-menu.item
    │   ├── x-ux::dropdown-menu.checkbox.item
    │   └── x-ux::dropdown-menu.radio.group
    │       └── x-ux::dropdown-menu.radio.item
    ├── x-ux::dropdown-menu.separator
    └── x-ux::dropdown-menu.sub
        ├── x-ux::dropdown-menu.sub.trigger
        └── x-ux::dropdown-menu.sub.content
```

## Basic

```blade preview
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger as-child><x-ux::button variant="outline">Open</x-ux::button></x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content>
        <x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.label>My Account</x-ux::dropdown-menu.label>
            <x-ux::dropdown-menu.item>Profile</x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item>Billing</x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item>Settings</x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.group>
        <x-ux::dropdown-menu.separator />
        <x-ux::dropdown-menu.item>GitHub</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.item>Support</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.item disabled>API</x-ux::dropdown-menu.item>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

## Checkboxes

```blade preview
<div x-data="{ statusBar: true, activityBar: false, panel: false }">
    <x-ux::dropdown-menu>
        <x-ux::dropdown-menu.trigger as-child><x-ux::button variant="outline">Open</x-ux::button></x-ux::dropdown-menu.trigger>
        <x-ux::dropdown-menu.content class="w-40">
            <x-ux::dropdown-menu.group>
                <x-ux::dropdown-menu.label>Appearance</x-ux::dropdown-menu.label>
                <x-ux::dropdown-menu.checkbox.item x-model="statusBar">Status Bar</x-ux::dropdown-menu.checkbox.item>
                <x-ux::dropdown-menu.checkbox.item x-model="activityBar" disabled>Activity Bar</x-ux::dropdown-menu.checkbox.item>
                <x-ux::dropdown-menu.checkbox.item x-model="panel">Panel</x-ux::dropdown-menu.checkbox.item>
            </x-ux::dropdown-menu.group>
        </x-ux::dropdown-menu.content>
    </x-ux::dropdown-menu>
</div>
```

## Checkboxes Icons

```blade preview
<div x-data="{ email: true, sms: false, push: true }">
    <x-ux::dropdown-menu>
        <x-ux::dropdown-menu.trigger as-child><x-ux::button variant="outline">Notifications</x-ux::button></x-ux::dropdown-menu.trigger>
        <x-ux::dropdown-menu.content class="w-48">
            <x-ux::dropdown-menu.group>
                <x-ux::dropdown-menu.label>Notification Preferences</x-ux::dropdown-menu.label>
                <x-ux::dropdown-menu.checkbox.item x-model="email"><x-ux::icon name="mail" /> Email notifications</x-ux::dropdown-menu.checkbox.item>
                <x-ux::dropdown-menu.checkbox.item x-model="sms"><x-ux::icon name="message-square" /> SMS notifications</x-ux::dropdown-menu.checkbox.item>
                <x-ux::dropdown-menu.checkbox.item x-model="push"><x-ux::icon name="bell" /> Push notifications</x-ux::dropdown-menu.checkbox.item>
            </x-ux::dropdown-menu.group>
        </x-ux::dropdown-menu.content>
    </x-ux::dropdown-menu>
</div>
```

## Destructive

```blade preview
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger as-child><x-ux::button variant="outline">Open</x-ux::button></x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content>
        <x-ux::dropdown-menu.item>Edit</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.item>Duplicate</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.separator />
        <x-ux::dropdown-menu.item variant="destructive"><x-ux::icon name="trash-2" /> Delete</x-ux::dropdown-menu.item>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

## Icons

```blade preview
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger as-child><x-ux::button variant="outline">Open</x-ux::button></x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content class="w-40">
        <x-ux::dropdown-menu.item><x-ux::icon name="user" /> Profile</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.item><x-ux::icon name="credit-card" /> Billing</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.item><x-ux::icon name="settings" /> Settings</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.separator />
        <x-ux::dropdown-menu.item><x-ux::icon name="log-out" /> Log out</x-ux::dropdown-menu.item>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

## Radio Group

```blade preview
<div x-data="{ position: 'bottom' }">
    <x-ux::dropdown-menu>
        <x-ux::dropdown-menu.trigger as-child><x-ux::button variant="outline">Open</x-ux::button></x-ux::dropdown-menu.trigger>
        <x-ux::dropdown-menu.content class="w-40">
            <x-ux::dropdown-menu.group>
                <x-ux::dropdown-menu.label>Panel Position</x-ux::dropdown-menu.label>
                <x-ux::dropdown-menu.radio.group x-model="position">
                    <x-ux::dropdown-menu.radio.item value="top">Top</x-ux::dropdown-menu.radio.item>
                    <x-ux::dropdown-menu.radio.item value="bottom">Bottom</x-ux::dropdown-menu.radio.item>
                    <x-ux::dropdown-menu.radio.item value="right">Right</x-ux::dropdown-menu.radio.item>
                </x-ux::dropdown-menu.radio.group>
            </x-ux::dropdown-menu.group>
        </x-ux::dropdown-menu.content>
    </x-ux::dropdown-menu>
</div>
```

## Radio Group Icons

```blade preview
<div x-data="{ theme: 'system' }">
    <x-ux::dropdown-menu>
        <x-ux::dropdown-menu.trigger as-child><x-ux::button variant="outline">Theme</x-ux::button></x-ux::dropdown-menu.trigger>
        <x-ux::dropdown-menu.content class="w-40">
            <x-ux::dropdown-menu.radio.group x-model="theme">
                <x-ux::dropdown-menu.radio.item value="light"><x-ux::icon name="sun" /> Light</x-ux::dropdown-menu.radio.item>
                <x-ux::dropdown-menu.radio.item value="dark"><x-ux::icon name="moon" /> Dark</x-ux::dropdown-menu.radio.item>
                <x-ux::dropdown-menu.radio.item value="system"><x-ux::icon name="monitor" /> System</x-ux::dropdown-menu.radio.item>
            </x-ux::dropdown-menu.radio.group>
        </x-ux::dropdown-menu.content>
    </x-ux::dropdown-menu>
</div>
```

## Shortcuts

```blade preview
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger as-child><x-ux::button variant="outline">Open</x-ux::button></x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content class="w-40">
        <x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.label>My Account</x-ux::dropdown-menu.label>
            <x-ux::dropdown-menu.item>Profile <x-ux::dropdown-menu.shortcut>⇧⌘P</x-ux::dropdown-menu.shortcut></x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item>Billing <x-ux::dropdown-menu.shortcut>⌘B</x-ux::dropdown-menu.shortcut></x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item>Settings <x-ux::dropdown-menu.shortcut>⌘S</x-ux::dropdown-menu.shortcut></x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.group>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

## Submenu

```blade preview
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger as-child><x-ux::button variant="outline">Open</x-ux::button></x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content>
        <x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.item>Team</x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.sub>
                <x-ux::dropdown-menu.sub.trigger>Invite users</x-ux::dropdown-menu.sub.trigger>
                <x-ux::dropdown-menu.sub.content>
                    <x-ux::dropdown-menu.item>Email</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>Message</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.sub>
                        <x-ux::dropdown-menu.sub.trigger>More options</x-ux::dropdown-menu.sub.trigger>
                        <x-ux::dropdown-menu.sub.content>
                            <x-ux::dropdown-menu.item>Calendly</x-ux::dropdown-menu.item>
                            <x-ux::dropdown-menu.item>Slack</x-ux::dropdown-menu.item>
                            <x-ux::dropdown-menu.separator />
                            <x-ux::dropdown-menu.item>Webhook</x-ux::dropdown-menu.item>
                        </x-ux::dropdown-menu.sub.content>
                    </x-ux::dropdown-menu.sub>
                    <x-ux::dropdown-menu.separator />
                    <x-ux::dropdown-menu.item>Advanced...</x-ux::dropdown-menu.item>
                </x-ux::dropdown-menu.sub.content>
            </x-ux::dropdown-menu.sub>
            <x-ux::dropdown-menu.item>New Team <x-ux::dropdown-menu.shortcut>⌘+T</x-ux::dropdown-menu.shortcut></x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.group>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

## Avatar

```blade preview
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger as-child>
        <x-ux::button variant="ghost" size="icon" class="rounded-full">
            <x-ux::avatar>
                <x-ux::avatar.image src="https://github.com/laravel.png" alt="laravel" />
                <x-ux::avatar.fallback>LR</x-ux::avatar.fallback>
            </x-ux::avatar>
        </x-ux::button>
    </x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content align="end">
        <x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.item><x-ux::icon name="badge-check" /> Account</x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item><x-ux::icon name="credit-card" /> Billing</x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item><x-ux::icon name="bell" /> Notifications</x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.group>
        <x-ux::dropdown-menu.separator />
        <x-ux::dropdown-menu.item><x-ux::icon name="log-out" /> Sign Out</x-ux::dropdown-menu.item>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

## Complex

```blade preview
<div x-data="{ sidebar: true, statusBar: false, theme: 'light' }">
    <x-ux::dropdown-menu>
        <x-ux::dropdown-menu.trigger as-child><x-ux::button variant="outline">Complex Menu</x-ux::button></x-ux::dropdown-menu.trigger>
        <x-ux::dropdown-menu.content class="w-44">
            <x-ux::dropdown-menu.group>
                <x-ux::dropdown-menu.label>File</x-ux::dropdown-menu.label>
                <x-ux::dropdown-menu.item><x-ux::icon name="file" /> New File <x-ux::dropdown-menu.shortcut>⌘N</x-ux::dropdown-menu.shortcut></x-ux::dropdown-menu.item>
                <x-ux::dropdown-menu.item><x-ux::icon name="folder" /> New Folder <x-ux::dropdown-menu.shortcut>⇧⌘N</x-ux::dropdown-menu.shortcut></x-ux::dropdown-menu.item>
                <x-ux::dropdown-menu.sub>
                    <x-ux::dropdown-menu.sub.trigger><x-ux::icon name="folder-open" /> Open Recent</x-ux::dropdown-menu.sub.trigger>
                    <x-ux::dropdown-menu.sub.content>
                        <x-ux::dropdown-menu.label>Recent Projects</x-ux::dropdown-menu.label>
                        <x-ux::dropdown-menu.item><x-ux::icon name="file-code" /> Project Alpha</x-ux::dropdown-menu.item>
                        <x-ux::dropdown-menu.item><x-ux::icon name="file-code" /> Project Beta</x-ux::dropdown-menu.item>
                        <x-ux::dropdown-menu.separator />
                        <x-ux::dropdown-menu.item><x-ux::icon name="folder-search" /> Browse...</x-ux::dropdown-menu.item>
                    </x-ux::dropdown-menu.sub.content>
                </x-ux::dropdown-menu.sub>
            </x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.separator />
            <x-ux::dropdown-menu.group>
                <x-ux::dropdown-menu.label>View</x-ux::dropdown-menu.label>
                <x-ux::dropdown-menu.checkbox.item x-model="sidebar"><x-ux::icon name="eye" /> Show Sidebar</x-ux::dropdown-menu.checkbox.item>
                <x-ux::dropdown-menu.checkbox.item x-model="statusBar"><x-ux::icon name="panels-top-left" /> Show Status Bar</x-ux::dropdown-menu.checkbox.item>
                <x-ux::dropdown-menu.sub>
                    <x-ux::dropdown-menu.sub.trigger><x-ux::icon name="palette" /> Theme</x-ux::dropdown-menu.sub.trigger>
                    <x-ux::dropdown-menu.sub.content>
                        <x-ux::dropdown-menu.label>Appearance</x-ux::dropdown-menu.label>
                        <x-ux::dropdown-menu.radio.group x-model="theme">
                            <x-ux::dropdown-menu.radio.item value="light"><x-ux::icon name="sun" /> Light</x-ux::dropdown-menu.radio.item>
                            <x-ux::dropdown-menu.radio.item value="dark"><x-ux::icon name="moon" /> Dark</x-ux::dropdown-menu.radio.item>
                            <x-ux::dropdown-menu.radio.item value="system"><x-ux::icon name="monitor" /> System</x-ux::dropdown-menu.radio.item>
                        </x-ux::dropdown-menu.radio.group>
                    </x-ux::dropdown-menu.sub.content>
                </x-ux::dropdown-menu.sub>
            </x-ux::dropdown-menu.group>
        </x-ux::dropdown-menu.content>
    </x-ux::dropdown-menu>
</div>
```

## RTL

Wrap isolated right-to-left menus with x-ux::direction.

```blade preview
<div x-data="{ statusBar: true, activityBar: false, panel: false, position: 'bottom' }">
    <x-ux::dropdown-menu>
        <x-ux::dropdown-menu.trigger as-child><x-ux::button variant="outline">افتح القائمة</x-ux::button></x-ux::dropdown-menu.trigger>
        <x-ux::dropdown-menu.content align="end" class="w-36" dir="rtl" data-lang="ar">
            <x-ux::dropdown-menu.group>
                <x-ux::dropdown-menu.sub>
                    <x-ux::dropdown-menu.sub.trigger>الحساب</x-ux::dropdown-menu.sub.trigger>
                    <x-ux::dropdown-menu.sub.content dir="rtl" data-lang="ar">
                        <x-ux::dropdown-menu.item><x-ux::icon name="user" /> الملف الشخصي</x-ux::dropdown-menu.item>
                        <x-ux::dropdown-menu.item><x-ux::icon name="credit-card" /> الفوترة</x-ux::dropdown-menu.item>
                        <x-ux::dropdown-menu.item><x-ux::icon name="settings" /> الإعدادات</x-ux::dropdown-menu.item>
                    </x-ux::dropdown-menu.sub.content>
                </x-ux::dropdown-menu.sub>
            </x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.separator />
            <x-ux::dropdown-menu.group>
                <x-ux::dropdown-menu.label>عرض</x-ux::dropdown-menu.label>
                <x-ux::dropdown-menu.checkbox.item x-model="statusBar">شريط الحالة</x-ux::dropdown-menu.checkbox.item>
                <x-ux::dropdown-menu.checkbox.item x-model="activityBar">شريط النشاط</x-ux::dropdown-menu.checkbox.item>
                <x-ux::dropdown-menu.checkbox.item x-model="panel">اللوحة</x-ux::dropdown-menu.checkbox.item>
            </x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.separator />
            <x-ux::dropdown-menu.group>
                <x-ux::dropdown-menu.label>الموضع</x-ux::dropdown-menu.label>
                <x-ux::dropdown-menu.radio.group x-model="position">
                    <x-ux::dropdown-menu.radio.item value="top">أعلى</x-ux::dropdown-menu.radio.item>
                    <x-ux::dropdown-menu.radio.item value="bottom">أسفل</x-ux::dropdown-menu.radio.item>
                    <x-ux::dropdown-menu.radio.item value="right">يمين</x-ux::dropdown-menu.radio.item>
                    <x-ux::dropdown-menu.radio.item value="left">يسار</x-ux::dropdown-menu.radio.item>
                </x-ux::dropdown-menu.radio.group>
            </x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.separator />
            <x-ux::dropdown-menu.item variant="destructive">تسجيل الخروج</x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.content>
    </x-ux::dropdown-menu>
</div>
```

## API Reference

### `x-ux::dropdown-menu`

| Prop   | Type      | Default |
|--------|-----------|---------|
| `open` | `boolean` | `false` |

### `x-ux::dropdown-menu.trigger`

| Prop       | Type      | Default |
|------------|-----------|---------|
| `as-child` | `boolean` | `false` |

### `x-ux::dropdown-menu.content`

| Prop          | Type                                             | Default    |
|---------------|--------------------------------------------------|------------|
| `align`       | `enum` [?"start" \| "center" \| "end"]      | `"start"`  |
| `side`        | `enum` [?"top" \| "right" \| "bottom" \| "left"] | `"bottom"` |
| `side-offset` | `number`                                         | `4`        |

### `x-ux::dropdown-menu.item`

| Prop       | Type                                     | Default     |
|------------|------------------------------------------|-------------|
| `variant`  | `enum` [?"default" \| "destructive"] | `"default"` |
| `inset`    | `boolean`                                | `false`     |
| `disabled` | `boolean`                                | `false`     |

### `x-ux::dropdown-menu.label`

| Prop    | Type      | Default |
|---------|-----------|---------|
| `inset` | `boolean` | `false` |

### `x-ux::dropdown-menu.checkbox.item`

| Prop       | Type      | Default |
|------------|-----------|---------|
| `checked`  | `boolean` | `false` |
| `inset`    | `boolean` | `false` |
| `disabled` | `boolean` | `false` |

### `x-ux::dropdown-menu.radio.group`

| Prop    | Type     | Default |
|---------|----------|---------|
| `value` | `string` | `""`    |

### `x-ux::dropdown-menu.radio.item`

| Prop       | Type      | Default |
|------------|-----------|---------|
| `value`*   | `string`  |         |
| `inset`    | `boolean` | `false` |
| `disabled` | `boolean` | `false` |

### `x-ux::dropdown-menu.sub.trigger`

| Prop    | Type      | Default |
|---------|-----------|---------|
| `inset` | `boolean` | `false` |

### `x-ux::dropdown-menu.sub.content`

| Prop          | Type                                             | Default   |
|---------------|--------------------------------------------------|-----------|
| `align`       | `enum` [?"start" \| "center" \| "end"]      | `"start"` |
| `side`        | `enum` [?"top" \| "right" \| "bottom" \| "left"] | `"right"` |
| `side-offset` | `number`                                         | `0`       |

## Publishing

```shell
php artisan vendor:publish --tag=ux-dropdown-menu --force
```
