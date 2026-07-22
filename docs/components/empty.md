# Empty

Use the Empty component to display an empty state.

```blade preview
<x-ux::empty>
    <x-ux::empty.header>
        <x-ux::empty.media variant="icon">
            <x-ux::icon name="folder-code" />
        </x-ux::empty.media>
        <x-ux::empty.title>No Projects Yet</x-ux::empty.title>
        <x-ux::empty.description>
            You haven't created any projects yet. Get started by creating your first project.
        </x-ux::empty.description>
    </x-ux::empty.header>
    <x-ux::empty.content class="flex-row justify-center gap-2">
        <x-ux::button>Create Project</x-ux::button>
        <x-ux::button variant="outline">Import Project</x-ux::button>
    </x-ux::empty.content>
    <x-ux::button
        href="#"
        variant="link"
        class="text-muted-foreground"
        size="sm"
    >
        Learn More
        <x-ux::icon name="arrow-up-right" size="14" data-icon="inline-end" />
    </x-ux::button>
</x-ux::empty>
```

## Usage

```blade
<x-ux::empty>
    <x-ux::empty.header>
        <x-ux::empty.media variant="icon">
            <x-ux::icon />
        </x-ux::empty.media>
        <x-ux::empty.title>No data</x-ux::empty.title>
        <x-ux::empty.description>No data found</x-ux::empty.description>
    </x-ux::empty.header>
    <x-ux::empty.content>
        <x-ux::button>Add data</x-ux::button>
    </x-ux::empty.content>
</x-ux::empty>
```

## Composition

```text
x-ux::empty
├── x-ux::empty.header
│   ├── x-ux::empty.media
│   ├── x-ux::empty.title
│   └── x-ux::empty.description
└── x-ux::empty.content
```

## Examples

### Outline

Use the `border` utility class to create an outline empty state.

```blade preview
<x-ux::empty class="border border-dashed">
    <x-ux::empty.header>
        <x-ux::empty.media variant="icon">
            <x-ux::icon name="cloud" />
        </x-ux::empty.media>
        <x-ux::empty.title>Cloud Storage Empty</x-ux::empty.title>
        <x-ux::empty.description>
            Upload files to your cloud storage to access them anywhere.
        </x-ux::empty.description>
    </x-ux::empty.header>
    <x-ux::empty.content>
        <x-ux::button variant="outline" size="sm">
            Upload Files
        </x-ux::button>
    </x-ux::empty.content>
</x-ux::empty>
```

### Background

Use the `bg-*` and `bg-gradient-*` utilities to add a background to the empty state.

```blade preview
<x-ux::empty class="h-full bg-muted/30">
    <x-ux::empty.header>
        <x-ux::empty.media variant="icon">
            <x-ux::icon name="bell" />
        </x-ux::empty.media>
        <x-ux::empty.title>No Notifications</x-ux::empty.title>
        <x-ux::empty.description class="max-w-xs text-pretty">
            You're all caught up. New notifications will appear here.
        </x-ux::empty.description>
    </x-ux::empty.header>
    <x-ux::empty.content>
        <x-ux::button variant="outline">
            <x-ux::icon name="refresh-ccw" data-icon="inline-start" />
            Refresh
        </x-ux::button>
    </x-ux::empty.content>
</x-ux::empty>
```

### Avatar

Use the `<x-ux::empty.media>` component to display an avatar in the empty state.

```blade preview
<x-ux::empty>
    <x-ux::empty.header>
        <x-ux::empty.media variant="default">
            <x-ux::avatar class="size-12">
                <x-ux::avatar.image
                    src="https://github.com/laravel.png"
                    class="grayscale"
                />
                <x-ux::avatar.fallback>LR</x-ux::avatar.fallback>
            </x-ux::avatar>
        </x-ux::empty.media>
        <x-ux::empty.title>User Offline</x-ux::empty.title>
        <x-ux::empty.description>
            This user is currently offline. You can leave a message to notify them or try again later.
        </x-ux::empty.description>
    </x-ux::empty.header>
    <x-ux::empty.content>
        <x-ux::button size="sm">Leave Message</x-ux::button>
    </x-ux::empty.content>
</x-ux::empty>
```

### Avatar Group

Use the `<x-ux::empty.media>` component to display an avatar group in the empty state.

```blade preview
<x-ux::empty>
    <x-ux::empty.header>
        <x-ux::empty.media>
            <div class="*:data-[slot=avatar]:ring-background flex -space-x-2 *:data-[slot=avatar]:size-8 *:data-[slot=avatar]:ring-2 *:data-[slot=avatar]:grayscale">
                <x-ux::avatar>
                    <x-ux::avatar.image src="https://github.com/laravel.png" alt="@laravel" />
                    <x-ux::avatar.fallback>CN</x-ux::avatar.fallback>
                </x-ux::avatar>
                <x-ux::avatar>
                    <x-ux::avatar.image
                        src="https://github.com/maxleiter.png"
                        alt="@maxleiter"
                    />
                    <x-ux::avatar.fallback>LR</x-ux::avatar.fallback>
                </x-ux::avatar>
                <x-ux::avatar>
                    <x-ux::avatar.image
                        src="https://github.com/evilrabbit.png"
                        alt="@evilrabbit"
                    />
                    <x-ux::avatar.fallback>ER</x-ux::avatar.fallback>
                </x-ux::avatar>
            </div>
        </x-ux::empty.media>
        <x-ux::empty.title>No Team Members</x-ux::empty.title>
        <x-ux::empty.description>
            Invite your team to collaborate on this project.
        </x-ux::empty.description>
    </x-ux::empty.header>
    <x-ux::empty.content>
        <x-ux::button>
            <x-ux::icon name="plus" data-icon="inline-start" />
            Invite Members
        </x-ux::button>
    </x-ux::empty.content>
</x-ux::empty>
```

### Input Group

You can add an `<x-ux::input-group>` component to the `<x-ux::empty.content>` component.

```blade preview
<x-ux::empty>
    <x-ux::empty.header>
        <x-ux::empty.title>404 - Not Found</x-ux::empty.title>
        <x-ux::empty.description>
            The page you're looking for doesn't exist.
            Try searching for what you need below.
        </x-ux::empty.description>
    </x-ux::empty.header>
    <x-ux::empty.content>
        <x-ux::input-group class="sm:w-3/4">
            <x-ux::input-group.input placeholder="Try searching for pages..." />
            <x-ux::input-group.addon>
                <x-ux::icon name="search" />
            </x-ux::input-group.addon>
            <x-ux::input-group.addon align="inline-end">
                <x-ux::kbd>/</x-ux::kbd>
            </x-ux::input-group.addon>
        </x-ux::input-group>
        <x-ux::empty.description>
            Need help? <a href="#">Contact support</a>
        </x-ux::empty.description>
    </x-ux::empty.content>
</x-ux::empty>
```

### RTL

Wrap an isolated empty state with Direction when its reading direction differs from the page.

```blade preview
<x-ux::direction direction="rtl">
    <x-ux::empty>
        <x-ux::empty.header>
            <x-ux::empty.media variant="icon">
                <x-ux::icon name="folder-code" size="16" />
            </x-ux::empty.media>
            <x-ux::empty.title>لا توجد مشاريع بعد</x-ux::empty.title>
            <x-ux::empty.description>
                لم تقم بإنشاء أي مشاريع بعد. ابدأ بإنشاء مشروعك الأول.
            </x-ux::empty.description>
        </x-ux::empty.header>
        <x-ux::empty.content class="flex-row justify-center gap-2">
            <x-ux::button>إنشاء مشروع</x-ux::button>
            <x-ux::button variant="outline">استيراد مشروع</x-ux::button>
        </x-ux::empty.content>
        <x-ux::button href="#" variant="link" class="text-muted-foreground" size="sm">
            تعرف على المزيد
            <x-ux::icon name="arrow-up-right" size="14" data-icon="inline-end" class="rtl:rotate-270" />
        </x-ux::button>
    </x-ux::empty>
</x-ux::direction>
```

## API Reference

### x-ux::empty.media

| Prop      | Type                          | Default     |
|-----------|-------------------------------|-------------|
| `variant` | `enum` [?"default" \| "icon"] | `"default"` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-empty --force
```
