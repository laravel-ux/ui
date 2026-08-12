# Collapsible

An interactive component which expands/collapses a panel.

```blade preview
<x-ux::collapsible class="flex w-[350px] flex-col gap-2">
    <div class="flex items-center justify-between gap-4 px-4">
        <h4 class="text-sm font-semibold">Order #4189</h4>
        <x-ux::collapsible.trigger as-child>
            <x-ux::button variant="ghost" size="icon" class="size-8" aria-label="Toggle details">
                <x-ux::icon name="chevrons-up-down" />
            </x-ux::button>
        </x-ux::collapsible.trigger>
    </div>
    <div class="flex items-center justify-between rounded-md border px-4 py-2 text-sm">
        <span class="text-muted-foreground">Status</span>
        <span class="font-medium">Shipped</span>
    </div>
    <x-ux::collapsible.content class="flex flex-col gap-2">
        <div class="rounded-md border px-4 py-2 text-sm">
            <p class="font-medium">Shipping address</p>
            <p class="text-muted-foreground">100 Market St, San Francisco</p>
        </div>
        <div class="rounded-md border px-4 py-2 text-sm">
            <p class="font-medium">Items</p>
            <p class="text-muted-foreground">2x Studio Headphones</p>
        </div>
    </x-ux::collapsible.content>
</x-ux::collapsible>
```

## Usage

```blade
<x-ux::collapsible>
    <x-ux::collapsible.trigger>
        Can I use this in my project?
    </x-ux::collapsible.trigger>
    <x-ux::collapsible.content>
        Yes. Free to use for personal and commercial projects. No attribution required.
    </x-ux::collapsible.content>
</x-ux::collapsible>
```

## Composition

Use the following composition to build a `<x-ux::collapsible>`:

```text
x-ux::collapsible
├── x-ux::collapsible.trigger
└── x-ux::collapsible.content
```

## Controlled State

Use `x-model` to control the open state.

```blade
<div x-data="{ open: false }">
    <x-ux::collapsible x-model="open">
        <x-ux::collapsible.trigger>Toggle</x-ux::collapsible.trigger>
        <x-ux::collapsible.content>Content</x-ux::collapsible.content>
    </x-ux::collapsible>
</div>
```

## Basic

```blade preview
<x-ux::card class="mx-auto w-full max-w-sm">
    <x-ux::card.content>
        <x-ux::collapsible class="rounded-md data-open:bg-muted">
            <x-ux::collapsible.trigger as-child>
                <x-ux::button variant="ghost" class="w-full">
                    Product details
                    <x-ux::icon
                        name="chevron-down"
                        class="ml-auto transition-transform group-data-panel-open/button:rotate-180"
                    />
                </x-ux::button>
            </x-ux::collapsible.trigger>
            <x-ux::collapsible.content class="flex flex-col items-start gap-2 p-2.5 pt-0 text-sm">
                <div>
                    This panel can be expanded or collapsed to reveal additional content.
                </div>
                <x-ux::button size="xs">Learn More</x-ux::button>
            </x-ux::collapsible.content>
        </x-ux::collapsible>
    </x-ux::card.content>
</x-ux::card>
```

## Settings Panel

Use a trigger button to reveal additional settings.

```blade preview
<x-ux::card class="mx-auto w-full max-w-xs" size="sm">
    <x-ux::card.header>
        <x-ux::card.title>Radius</x-ux::card.title>
        <x-ux::card.description>Set the corner radius of the element.</x-ux::card.description>
    </x-ux::card.header>
    <x-ux::card.content>
        <x-ux::collapsible class="flex items-start gap-2">
            <x-ux::field.group class="grid w-full grid-cols-2 gap-2">
                <x-ux::field>
                    <x-ux::field.label for="radius-x" class="sr-only">Radius X</x-ux::field.label>
                    <x-ux::input id="radius-x" placeholder="0" value="0" />
                </x-ux::field>
                <x-ux::field>
                    <x-ux::field.label for="radius-y" class="sr-only">Radius Y</x-ux::field.label>
                    <x-ux::input id="radius-y" placeholder="0" value="0" />
                </x-ux::field>
                <x-ux::collapsible.content class="col-span-full grid grid-cols-subgrid gap-2">
                    <x-ux::field>
                        <x-ux::field.label for="radius-top" class="sr-only">Radius Top</x-ux::field.label>
                        <x-ux::input id="radius-top" placeholder="0" value="0" />
                    </x-ux::field>
                    <x-ux::field>
                        <x-ux::field.label for="radius-bottom" class="sr-only">Radius Bottom</x-ux::field.label>
                        <x-ux::input id="radius-bottom" placeholder="0" value="0" />
                    </x-ux::field>
                </x-ux::collapsible.content>
            </x-ux::field.group>
            <x-ux::collapsible.trigger as-child>
                <x-ux::button variant="outline" size="icon" aria-label="Toggle individual radius settings">
                    <x-ux::icon name="maximize" x-show="!__isOpen" />
                    <x-ux::icon name="minimize" x-show="__isOpen" />
                </x-ux::button>
            </x-ux::collapsible.trigger>
        </x-ux::collapsible>
    </x-ux::card.content>
</x-ux::card>
```

## File Tree

Use nested collapsibles to build a file tree.

```blade preview
<x-ux::card class="mx-auto w-full max-w-[16rem] gap-2" size="sm">
    <x-ux::card.header>
        <x-ux::tabs value="explorer">
            <x-ux::tabs.list class="w-full">
                <x-ux::tabs.trigger value="explorer">Explorer</x-ux::tabs.trigger>
                <x-ux::tabs.trigger value="settings">Outline</x-ux::tabs.trigger>
            </x-ux::tabs.list>
        </x-ux::tabs>
    </x-ux::card.header>
    <x-ux::card.content>
        <div class="flex flex-col gap-1">
            <x-ux::collapsible>
                <x-ux::collapsible.trigger as-child>
                    <x-ux::button variant="ghost" size="sm" class="group w-full justify-start transition-none hover:bg-accent hover:text-accent-foreground">
                        <x-ux::icon name="chevron-right" class="transition-transform group-data-panel-open/button:rotate-90" />
                        <x-ux::icon name="folder" />
                        components
                    </x-ux::button>
                </x-ux::collapsible.trigger>
                <x-ux::collapsible.content class="mt-1 ml-5">
                    <div class="flex flex-col gap-1">
                        <x-ux::collapsible>
                            <x-ux::collapsible.trigger as-child>
                                <x-ux::button variant="ghost" size="sm" class="group w-full justify-start transition-none hover:bg-accent hover:text-accent-foreground">
                                    <x-ux::icon name="chevron-right" class="transition-transform group-data-panel-open/button:rotate-90" />
                                    <x-ux::icon name="folder" />
                                    ui
                                </x-ux::button>
                            </x-ux::collapsible.trigger>
                            <x-ux::collapsible.content class="mt-1 ml-5">
                                <div class="flex flex-col gap-1">
                                    @foreach (['button.blade.php', 'card.blade.php', 'dialog.blade.php', 'input.blade.php'] as $file)
                                        <x-ux::button variant="link" size="sm" class="w-full justify-start gap-2 text-foreground">
                                            <x-ux::icon name="file" />
                                            <span>{{ $file }}</span>
                                        </x-ux::button>
                                    @endforeach
                                </div>
                            </x-ux::collapsible.content>
                        </x-ux::collapsible>
                        @foreach (['login-form.blade.php', 'register-form.blade.php'] as $file)
                            <x-ux::button variant="link" size="sm" class="w-full justify-start gap-2 text-foreground">
                                <x-ux::icon name="file" />
                                <span>{{ $file }}</span>
                            </x-ux::button>
                        @endforeach
                    </div>
                </x-ux::collapsible.content>
            </x-ux::collapsible>
            @foreach ([
                'lib' => ['utils.ts', 'cn.ts', 'api.ts'],
                'hooks' => ['use-media-query.ts', 'use-debounce.ts', 'use-local-storage.ts'],
                'types' => ['index.d.ts', 'api.d.ts'],
                'public' => ['favicon.ico', 'logo.svg', 'images'],
            ] as $folder => $files)
                <x-ux::collapsible>
                    <x-ux::collapsible.trigger as-child>
                        <x-ux::button variant="ghost" size="sm" class="group w-full justify-start transition-none hover:bg-accent hover:text-accent-foreground">
                            <x-ux::icon name="chevron-right" class="transition-transform group-data-panel-open/button:rotate-90" />
                            <x-ux::icon name="folder" />
                            {{ $folder }}
                        </x-ux::button>
                    </x-ux::collapsible.trigger>
                    <x-ux::collapsible.content class="mt-1 ml-5">
                        <div class="flex flex-col gap-1">
                            @foreach ($files as $file)
                                <x-ux::button variant="link" size="sm" class="w-full justify-start gap-2 text-foreground">
                                    <x-ux::icon name="file" />
                                    <span>{{ $file }}</span>
                                </x-ux::button>
                            @endforeach
                        </div>
                    </x-ux::collapsible.content>
                </x-ux::collapsible>
            @endforeach
            @foreach (['web.php', 'User.php', 'AppServiceProvider.php', 'composer.json', 'artisan', 'README.md', '.gitignore'] as $file)
                <x-ux::button variant="link" size="sm" class="w-full justify-start gap-2 text-foreground">
                    <x-ux::icon name="file" />
                    <span>{{ $file }}</span>
                </x-ux::button>
            @endforeach
        </div>
    </x-ux::card.content>
</x-ux::card>
```

## RTL

To enable RTL support, set the `dir="rtl"` attribute on the collapsible or a parent element.

```blade preview
<x-ux::collapsible class="flex w-[350px] flex-col gap-2" dir="rtl">
    <div class="flex items-center justify-between gap-4 px-4">
        <h4 class="text-sm font-semibold">الطلب #4189</h4>
        <x-ux::collapsible.trigger as-child>
            <x-ux::button variant="ghost" size="icon" class="size-8" aria-label="Toggle details">
                <x-ux::icon name="chevrons-up-down" />
            </x-ux::button>
        </x-ux::collapsible.trigger>
    </div>
    <div class="flex items-center justify-between rounded-md border px-4 py-2 text-sm">
        <span class="text-muted-foreground">الحالة</span>
        <span class="font-medium">تم الشحن</span>
    </div>
    <x-ux::collapsible.content class="flex flex-col gap-2">
        <div class="rounded-md border px-4 py-2 text-sm">
            <p class="font-medium">عنوان الشحن</p>
            <p class="text-muted-foreground">100 Market St, San Francisco</p>
        </div>
        <div class="rounded-md border px-4 py-2 text-sm">
            <p class="font-medium">العناصر</p>
            <p class="text-muted-foreground">2x سماعات الاستوديو</p>
        </div>
    </x-ux::collapsible.content>
</x-ux::collapsible>
```

## API Reference

### x-ux::collapsible

| Prop       | Type      | Default |
|------------|-----------|---------|
| `open`     | `boolean` | `false` |
| `disabled` | `boolean` | `false` |

### x-ux::collapsible.trigger

| Prop       | Type      | Default |
|------------|-----------|---------|
| `as-child` | `boolean` | `false` |

## Publishing

This component works out of the box, but you can publish its Blade views if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-collapsible --force
```
