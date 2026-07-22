# Navigation Menu

A collection of links for navigating websites.

```blade preview
<x-ux::navigation-menu>
    <x-ux::navigation-menu.list>
        <x-ux::navigation-menu.item>
            <x-ux::navigation-menu.trigger>Getting started</x-ux::navigation-menu.trigger>
            <x-ux::navigation-menu.content>
                <ul class="grid gap-2 md:w-[400px] lg:w-[500px] lg:grid-cols-[.75fr_1fr]">
                    <li class="row-span-3">
                        <x-ux::navigation-menu.link
                            href="#"
                            class="from-muted/50 to-muted flex h-full w-full flex-col justify-end 
                            rounded-md bg-linear-to-b p-6 no-underline outline-hidden select-none focus:shadow-md"
                        >
                            <div class="mt-4 mb-2 text-lg font-medium">
                                Laravel UX
                            </div>
                            <p class="text-muted-foreground text-sm leading-tight">
                                Beautifully designed Blade components for Laravel and Livewire.
                            </p>
                        </x-ux::navigation-menu.link>
                    </li>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Introduction
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            Reusable components built for Laravel with Tailwind CSS.
                        </p>
                    </x-ux::navigation-menu.link>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Installation
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            How to install dependencies and structure your app.
                        </p>
                    </x-ux::navigation-menu.link>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Typography
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            Styles for headings, paragraphs, lists...etc
                        </p>
                    </x-ux::navigation-menu.link>
                </ul>
            </x-ux::navigation-menu.content>
        </x-ux::navigation-menu.item>
        <x-ux::navigation-menu.item>
            <x-ux::navigation-menu.trigger>Components</x-ux::navigation-menu.trigger>
            <x-ux::navigation-menu.content>
                <ul class="grid w-[400px] gap-2 md:w-[500px] md:grid-cols-2 lg:w-[600px]">
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Alert Dialog
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            A modal dialog that interrupts the user with important content and expects a response.
                        </p>
                    </x-ux::navigation-menu.link>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Hover Card
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            For sighted users to preview content available behind a link.
                        </p>
                    </x-ux::navigation-menu.link>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Progress
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            Displays an indicator showing the completion progress of a task, typically displayed as a progress bar.
                        </p>
                    </x-ux::navigation-menu.link>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Scroll-area
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            Visually or semantically separates content.
                        </p>
                    </x-ux::navigation-menu.link>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Tabs
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            A set of layered sections of content—known as tab panels—that are displayed one at a time.
                        </p>
                    </x-ux::navigation-menu.link>
                    <x-ux::navigation-menu.link href="#">
                        <div class="text-sm leading-none font-medium">
                            Tooltip
                        </div>
                        <p class="text-muted-foreground line-clamp-2 text-sm leading-snug">
                            A popup that displays information related to an element when the element receives keyboard focus or the mouse hovers over it.
                        </p>
                    </x-ux::navigation-menu.link>
                </ul>
            </x-ux::navigation-menu.content>
        </x-ux::navigation-menu.item>
        <x-ux::navigation-menu.item>
            <x-ux::navigation-menu.link href="#" class="h-9 justify-center px-4 py-2">
                Documentation
            </x-ux::navigation-menu.link>
        </x-ux::navigation-menu.item>
    </x-ux::navigation-menu.list>
</x-ux::navigation-menu>
```

The menu opens on click. Opening another trigger closes the currently open item.

## Usage

```blade
<x-ux::navigation-menu>
    <x-ux::navigation-menu.list>
        <x-ux::navigation-menu.item>
            <x-ux::navigation-menu.trigger>Item One</x-ux::navigation-menu.trigger>
            <x-ux::navigation-menu.content>
                <x-ux::navigation-menu.link>Link</x-ux::navigation-menu.link>
            </x-ux::navigation-menu.content>
        </x-ux::navigation-menu.item>
    </x-ux::navigation-menu.list>
</x-ux::navigation-menu>
```

## Composition

```text
x-ux::navigation-menu
└── x-ux::navigation-menu.list
    ├── x-ux::navigation-menu.item
    │   ├── x-ux::navigation-menu.trigger
    │   └── x-ux::navigation-menu.content
    │       └── x-ux::navigation-menu.link
    └── x-ux::navigation-menu.item
        └── x-ux::navigation-menu.link
```

## RTL

```blade preview
<div dir="rtl">
    <x-ux::navigation-menu>
        <x-ux::navigation-menu.list>
            <x-ux::navigation-menu.item>
                <x-ux::navigation-menu.trigger>البدء</x-ux::navigation-menu.trigger>
                <x-ux::navigation-menu.content data-lang="ar">
                    <ul class="w-96">
                        <li>
                            <x-ux::navigation-menu.link href="#">
                                <div class="flex flex-col gap-1 text-sm">
                                    <div class="leading-none font-medium">مقدمة</div>
                                    <div class="text-muted-foreground line-clamp-2">مكونات قابلة لإعادة الاستخدام مبنية باستخدام Tailwind CSS.</div>
                                </div>
                            </x-ux::navigation-menu.link>
                        </li>
                        <li>
                            <x-ux::navigation-menu.link href="#">
                                <div class="flex flex-col gap-1 text-sm">
                                    <div class="leading-none font-medium">التثبيت</div>
                                    <div class="text-muted-foreground line-clamp-2">كيفية تثبيت التبعيات وتنظيم تطبيق Laravel الخاص بك.</div>
                                </div>
                            </x-ux::navigation-menu.link>
                        </li>
                        <li>
                            <x-ux::navigation-menu.link href="#">
                                <div class="flex flex-col gap-1 text-sm">
                                    <div class="leading-none font-medium">الطباعة</div>
                                    <div class="text-muted-foreground line-clamp-2">أنماط للعناوين والفقرات والقوائم...إلخ</div>
                                </div>
                            </x-ux::navigation-menu.link>
                        </li>
                    </ul>
                </x-ux::navigation-menu.content>
            </x-ux::navigation-menu.item>
            <x-ux::navigation-menu.item class="hidden md:flex">
                <x-ux::navigation-menu.trigger>المكونات</x-ux::navigation-menu.trigger>
                <x-ux::navigation-menu.content data-lang="ar">
                    <ul class="grid w-[400px] gap-2 md:w-[500px] md:grid-cols-2 lg:w-[600px]">
                        @foreach([
                            ['حوار التنبيه', 'حوار نافذة يقطع المستخدم بمحتوى مهم ويتوقع استجابة.'],
                            ['بطاقة التحويم', 'للمستخدمين المبصرين لمعاينة المحتوى المتاح خلف الرابط.'],
                            ['التقدم', 'يعرض مؤشرًا يوضح تقدم إتمام المهمة، عادةً يتم عرضه كشريط تقدم.'],
                            ['منطقة التمرير', 'يفصل المحتوى بصريًا أو دلاليًا.'],
                            ['التبويبات', 'مجموعة من أقسام المحتوى المتعددة الطبقات التي يتم عرضها واحدة في كل مرة.'],
                            ['تلميح', 'نافذة منبثقة تعرض معلومات متعلقة بعنصر عند تلقيه تركيز لوحة المفاتيح.'],
                        ] as [$title, $description])
                            <li>
                                <x-ux::navigation-menu.link href="#">
                                    <div class="flex flex-col gap-1 text-sm">
                                        <div class="leading-none font-medium">{{ $title }}</div>
                                        <div class="text-muted-foreground line-clamp-2">{{ $description }}</div>
                                    </div>
                                </x-ux::navigation-menu.link>
                            </li>
                        @endforeach
                    </ul>
                </x-ux::navigation-menu.content>
            </x-ux::navigation-menu.item>
            <x-ux::navigation-menu.item>
                <x-ux::navigation-menu.link href="#" data-lang="ar" class="h-9 justify-center px-4 py-2">الوثائق</x-ux::navigation-menu.link>
            </x-ux::navigation-menu.item>
        </x-ux::navigation-menu.list>
    </x-ux::navigation-menu>
</div>
```

## API Reference

### x-ux::navigation-menu.content

| Prop | Type | Default |
| --- | --- | --- |
| `side` | `enum` [?"top" \| "right" \| "bottom" \| "left"] | `"bottom"` |
| `side-offset` | `number` | `4` |
| `align` | `enum` [?"start" \| "center" \| "end"] | `"start"` |


### x-ux::navigation-menu.link

| Prop | Type | Default |
| --- | --- | --- |
| `active` | `boolean` | `false` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-navigation-menu --force
```
