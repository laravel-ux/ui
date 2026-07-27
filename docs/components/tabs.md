# Tabs

A set of layered sections of content—known as tab panels—that are displayed one at a time.

```blade preview
<x-ux::tabs value="overview" class="w-[400px]">
    <x-ux::tabs.list>
        <x-ux::tabs.trigger value="overview">Overview</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="analytics">Analytics</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="reports">Reports</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="settings">Settings</x-ux::tabs.trigger>
    </x-ux::tabs.list>
    <x-ux::tabs.content value="overview">
        <x-ux::card>
            <x-ux::card.header>
                <x-ux::card.title>Overview</x-ux::card.title>
                <x-ux::card.description>
                    View your key metrics and recent project activity. Track progress across all your active projects.
                </x-ux::card.description>
            </x-ux::card.header>
            <x-ux::card.content class="text-sm text-muted-foreground">
                You have 12 active projects and 3 pending tasks.
            </x-ux::card.content>
        </x-ux::card>
    </x-ux::tabs.content>
    <x-ux::tabs.content value="analytics">
        <x-ux::card>
            <x-ux::card.header>
                <x-ux::card.title>Analytics</x-ux::card.title>
                <x-ux::card.description>
                    Track performance and user engagement metrics. Monitor trends and identify growth opportunities.
                </x-ux::card.description>
            </x-ux::card.header>
            <x-ux::card.content class="text-sm text-muted-foreground">
                Page views are up 25% compared to last month.
            </x-ux::card.content>
        </x-ux::card>
    </x-ux::tabs.content>
    <x-ux::tabs.content value="reports">
        <x-ux::card>
            <x-ux::card.header>
                <x-ux::card.title>Reports</x-ux::card.title>
                <x-ux::card.description>
                    Generate and download your detailed reports. Export data in multiple formats for analysis.
                </x-ux::card.description>
            </x-ux::card.header>
            <x-ux::card.content class="text-sm text-muted-foreground">
                You have 5 reports ready and available to export.
            </x-ux::card.content>
        </x-ux::card>
    </x-ux::tabs.content>
    <x-ux::tabs.content value="settings">
        <x-ux::card>
            <x-ux::card.header>
                <x-ux::card.title>Settings</x-ux::card.title>
                <x-ux::card.description>
                    Manage your account preferences and options. Customize your experience to fit your needs.
                </x-ux::card.description>
            </x-ux::card.header>
            <x-ux::card.content class="text-sm text-muted-foreground">
                Configure notifications, security, and themes.
            </x-ux::card.content>
        </x-ux::card>
    </x-ux::tabs.content>
</x-ux::tabs>
```

## Usage

```blade
<x-ux::tabs value="account" class="w-[400px]">
    <x-ux::tabs.list>
        <x-ux::tabs.trigger value="account">Account</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="password">Password</x-ux::tabs.trigger>
    </x-ux::tabs.list>
    <x-ux::tabs.content value="account">Make changes to your account here.</x-ux::tabs.content>
    <x-ux::tabs.content value="password">Change your password here.</x-ux::tabs.content>
</x-ux::tabs>
```

## Composition

Use the following composition to build Tabs:

```text
x-ux::tabs
├── x-ux::tabs.list
│   ├── x-ux::tabs.trigger
│   └── x-ux::tabs.trigger
├── x-ux::tabs.content
└── x-ux::tabs.content
```

## Line

Use the `variant="line"` prop on `x-ux::tabs.list` for a line style.

```blade preview
<x-ux::tabs value="overview">
    <x-ux::tabs.list variant="line">
        <x-ux::tabs.trigger value="overview">Overview</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="analytics">Analytics</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="reports">Reports</x-ux::tabs.trigger>
    </x-ux::tabs.list>
</x-ux::tabs>
```

## Vertical

Use `orientation="vertical"` for vertical tabs.

```blade preview
<x-ux::tabs value="account" orientation="vertical">
    <x-ux::tabs.list>
        <x-ux::tabs.trigger value="account">Account</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="password">Password</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="notifications">Notifications</x-ux::tabs.trigger>
    </x-ux::tabs.list>
</x-ux::tabs>
```

## Disabled

```blade preview
<x-ux::tabs value="home">
    <x-ux::tabs.list>
        <x-ux::tabs.trigger value="home">Home</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="settings" disabled>Disabled</x-ux::tabs.trigger>
    </x-ux::tabs.list>
</x-ux::tabs>
```

## Icons

```blade preview
<x-ux::tabs value="preview">
    <x-ux::tabs.list>
        <x-ux::tabs.trigger value="preview">
            <x-ux::icon name="app-window" />
            Preview
        </x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="code">
            <x-ux::icon name="code" />
            Code
        </x-ux::tabs.trigger>
    </x-ux::tabs.list>
</x-ux::tabs>
```

## RTL

```blade preview
<x-ux::tabs value="overview" class="w-full max-w-sm" dir="rtl">
    <x-ux::tabs.list>
        <x-ux::tabs.trigger value="overview">نظرة عامة</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="analytics">التحليلات</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="reports">التقارير</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="settings">الإعدادات</x-ux::tabs.trigger>
    </x-ux::tabs.list>
    <x-ux::tabs.content value="overview">
        <x-ux::card>
            <x-ux::card.header>
                <x-ux::card.title>نظرة عامة</x-ux::card.title>
                <x-ux::card.description>
                    عرض مقاييسك الرئيسية وأنشطة المشروع الأخيرة. تتبع التقدم عبر جميع مشاريعك النشطة.
                </x-ux::card.description>
            </x-ux::card.header>
            <x-ux::card.content class="text-sm text-muted-foreground">
                لديك ١٢ مشروعًا نشطًا و٣ مهام معلقة.
            </x-ux::card.content>
        </x-ux::card>
    </x-ux::tabs.content>
    <x-ux::tabs.content value="analytics">
        <x-ux::card>
            <x-ux::card.header>
                <x-ux::card.title>التحليلات</x-ux::card.title>
                <x-ux::card.description>
                    تتبع مقاييس الأداء ومشاركة المستخدمين. راقب الاتجاهات وحدد فرص النمو.
                </x-ux::card.description>
            </x-ux::card.header>
            <x-ux::card.content class="text-sm text-muted-foreground">
                زادت مشاهدات الصفحة بنسبة ٢٥٪ مقارنة بالشهر الماضي.
            </x-ux::card.content>
        </x-ux::card>
    </x-ux::tabs.content>
    <x-ux::tabs.content value="reports">
        <x-ux::card>
            <x-ux::card.header>
                <x-ux::card.title>التقارير</x-ux::card.title>
                <x-ux::card.description>
                    إنشاء وتنزيل تقاريرك التفصيلية. تصدير البيانات بتنسيقات متعددة للتحليل.
                </x-ux::card.description>
            </x-ux::card.header>
            <x-ux::card.content class="text-sm text-muted-foreground">
                لديك ٥ تقارير جاهزة ومتاحة للتصدير.
            </x-ux::card.content>
        </x-ux::card>
    </x-ux::tabs.content>
    <x-ux::tabs.content value="settings">
        <x-ux::card>
            <x-ux::card.header>
                <x-ux::card.title>الإعدادات</x-ux::card.title>
                <x-ux::card.description>
                    إدارة تفضيلات حسابك وخياراته. تخصيص تجربتك لتناسب احتياجاتك.
                </x-ux::card.description>
            </x-ux::card.header>
            <x-ux::card.content class="text-sm text-muted-foreground">
                تكوين الإشعارات والأمان والسمات.
            </x-ux::card.content>
        </x-ux::card>
    </x-ux::tabs.content>
</x-ux::tabs>
```

## API Reference

### `x-ux::tabs`

| Prop              | Type                                      | Default        |
|-------------------|-------------------------------------------|----------------|
| `value`           | `string`                                  | `null`         |
| `orientation`     | `enum` [?"horizontal" \| "vertical"]      | `"horizontal"` |
| `activation-mode` | `enum` [?"automatic" \| "manual"]         | `"automatic"`  |

### `x-ux::tabs.list`

| Prop      | Type                            | Default     |
|-----------|---------------------------------|-------------|
| `variant` | `enum` [?"default" \| "line"]   | `"default"` |

### `x-ux::tabs.trigger`

| Prop     | Type      | Default |
|----------|-----------|---------|
| `value*` | `string`  | -       |
| `disabled` | `boolean` | `false` |

### `x-ux::tabs.content`

| Prop     | Type     | Default |
|----------|----------|---------|
| `value*` | `string` | -       |

## Publishing

This component works out of the box, but you can publish its Blade views if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-tabs --force
```
