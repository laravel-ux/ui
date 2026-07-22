# Card

Displays a card with header, content, and footer.

```blade preview
<x-ux::card class="w-full max-w-sm">
    <x-ux::card.header>
        <x-ux::card.title>Login to your account</x-ux::card.title>
        <x-ux::card.description>
            Enter your email below to login to your account
        </x-ux::card.description>
        <x-ux::card.action>
            <x-ux::button variant="link">Sign Up</x-ux::button>
        </x-ux::card.action>
    </x-ux::card.header>
    <x-ux::card.content>
        <form>
            <div class="flex flex-col gap-6">
                <div class="grid gap-2">
                    <x-ux::label for="email">Email</x-ux::label>
                    <x-ux::input id="email" type="email" placeholder="m@example.com" required />
                </div>
                <div class="grid gap-2">
                    <div class="flex items-center">
                        <x-ux::label for="password">Password</x-ux::label>
                        <a href="#" class="ml-auto inline-block text-sm underline-offset-4 hover:underline">
                            Forgot your password?
                        </a>
                    </div>
                    <x-ux::input id="password" type="password" required />
                </div>
            </div>
        </form>
    </x-ux::card.content>
    <x-ux::card.footer class="flex-col gap-2">
        <x-ux::button type="submit" class="w-full">Login</x-ux::button>
        <x-ux::button variant="outline" class="w-full">Login with Google</x-ux::button>
    </x-ux::card.footer>
</x-ux::card>
```

## Usage

```blade
<x-ux::card>
    <x-ux::card.header>
        <x-ux::card.title>Card Title</x-ux::card.title>
        <x-ux::card.description>Card Description</x-ux::card.description>
        <x-ux::card.action>Card Action</x-ux::card.action>
    </x-ux::card.header>
    <x-ux::card.content>
        <p>Card Content</p>
    </x-ux::card.content>
    <x-ux::card.footer>
        <p>Card Footer</p>
    </x-ux::card.footer>
</x-ux::card>
```

## Composition

Use the following composition to build a `<x-ux::card>`:

```text
x-ux::card
├── x-ux::card.header
│   ├── x-ux::card.title
│   ├── x-ux::card.description
│   └── x-ux::card.action
├── x-ux::card.content
└── x-ux::card.footer
```

## Size

Use the `size="sm"` prop to set the size of the card to small. The small size variant uses smaller spacing.

```blade preview
<x-ux::card size="sm" class="mx-auto w-full max-w-xs">
    <x-ux::card.header>
        <x-ux::card.title>Scheduled reports</x-ux::card.title>
        <x-ux::card.description>
            Weekly snapshots. No more manual exports.
        </x-ux::card.description>
    </x-ux::card.header>
    <x-ux::card.content>
        <ul class="grid gap-2 py-2 text-sm">
            <li class="flex gap-2">
                <x-ux::icon name="chevron-right" class="mt-0.5 size-4 shrink-0 text-muted-foreground" />
                <span>Choose a schedule (daily, or weekly).</span>
            </li>
            <li class="flex gap-2">
                <x-ux::icon name="chevron-right" class="mt-0.5 size-4 shrink-0 text-muted-foreground" />
                <span>Send to channels or specific teammates.</span>
            </li>
            <li class="flex gap-2">
                <x-ux::icon name="chevron-right" class="mt-0.5 size-4 shrink-0 text-muted-foreground" />
                <span>Include charts, tables, and key metrics.</span>
            </li>
        </ul>
    </x-ux::card.content>
    <x-ux::card.footer class="flex-col gap-2">
        <x-ux::button size="sm" class="w-full">Set up scheduled reports</x-ux::button>
        <x-ux::button variant="outline" size="sm" class="w-full">See what's new</x-ux::button>
    </x-ux::card.footer>
</x-ux::card>
```

## Spacing

In addition to the `size` prop, you can use the `--card-spacing` CSS variable to control the spacing between sections and the inset of card parts.

```blade preview
<div x-data="{ spacing: '4' }" class="mx-auto grid w-full max-w-sm gap-4">
    <x-ux::toggle-group
        x-model="spacing"
        value="4"
        variant="outline"
        size="sm"
        class="justify-center"
    >
        <x-ux::toggle-group.item value="4">16px</x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="5">20px</x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="6">24px</x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="8">32px</x-ux::toggle-group.item>
    </x-ux::toggle-group>
    <x-ux::card x-bind:style="`--card-spacing: ${spacing * 0.25}rem`">
        <x-ux::card.header>
            <x-ux::card.title>Login to your account</x-ux::card.title>
            <x-ux::card.description>
                Enter your email below to login to your account
            </x-ux::card.description>
            <x-ux::card.action>
                <x-ux::button variant="link">Sign Up</x-ux::button>
            </x-ux::card.action>
        </x-ux::card.header>
        <x-ux::card.content>
            <form>
                <div class="flex flex-col gap-6">
                    <div class="grid gap-2">
                        <x-ux::label for="email-spacing">Email</x-ux::label>
                        <x-ux::input id="email-spacing" type="email" placeholder="m@example.com" required />
                    </div>
                    <div class="grid gap-2">
                        <div class="flex items-center">
                            <x-ux::label for="password-spacing">Password</x-ux::label>
                            <a href="#" class="ml-auto inline-block text-sm underline-offset-4 hover:underline">
                                Forgot your password?
                            </a>
                        </div>
                        <x-ux::input id="password-spacing" type="password" required />
                    </div>
                </div>
            </form>
        </x-ux::card.content>
        <x-ux::card.footer class="flex-col gap-2">
            <x-ux::button type="submit" class="w-full">Login</x-ux::button>
            <x-ux::button variant="outline" class="w-full">Login with Google</x-ux::button>
        </x-ux::card.footer>
    </x-ux::card>
</div>
```

Use negative margins with `-mx-(--card-spacing)` to make content go edge to edge while keeping it aligned with the card inset. When the edge-to-edge content sits above a footer, use `-mb-(--card-spacing)` on `<x-ux::card.content>` to remove the section gap.

```blade preview
<x-ux::card class="mx-auto w-full max-w-sm">
    <x-ux::card.header>
        <x-ux::card.title>Terms of Service</x-ux::card.title>
        <x-ux::card.description>
            Review the terms before accepting the agreement.
        </x-ux::card.description>
    </x-ux::card.header>
    <x-ux::card.content class="-mb-(--card-spacing)">
        <div class="-mx-(--card-spacing) max-h-48 space-y-4 overflow-y-scroll border-t bg-muted/50 px-(--card-spacing) py-4 text-sm leading-relaxed">
            <p>These terms govern your use of the workspace, including access to shared documents, project files, and collaboration tools.</p>
            <p>You are responsible for the content you upload and for ensuring that your team has the appropriate permissions to view or edit it.</p>
            <p>We may update features or limits as the service evolves. When those changes materially affect your workflow, we will notify your workspace administrators.</p>
            <p>By continuing, you agree to keep your account credentials secure and to follow your organization's acceptable use policies.</p>
        </div>
    </x-ux::card.content>
    <x-ux::card.footer class="justify-end gap-2">
        <x-ux::button variant="outline">Decline</x-ux::button>
        <x-ux::button>Accept</x-ux::button>
    </x-ux::card.footer>
</x-ux::card>
```

## Image

Add an image before the card header to create a card with an image.

```blade preview
<x-ux::card class="relative mx-auto w-full max-w-sm pt-0">
    <div class="absolute inset-0 z-30 aspect-video bg-black/35"></div>
    <img
        src="https://github.com/laravel.png"
        alt="Event cover"
        class="relative z-20 aspect-video w-full object-cover brightness-60 grayscale dark:brightness-40"
    />
    <x-ux::card.header>
        <x-ux::card.action>
            <x-ux::badge variant="secondary">Featured</x-ux::badge>
        </x-ux::card.action>
        <x-ux::card.title>Design systems meetup</x-ux::card.title>
        <x-ux::card.description>
            A practical talk on component APIs, accessibility, and shipping faster.
        </x-ux::card.description>
    </x-ux::card.header>
    <x-ux::card.footer>
        <x-ux::button class="w-full">View Event</x-ux::button>
    </x-ux::card.footer>
</x-ux::card>
```

## RTL

To enable RTL support, set the `dir="rtl"` attribute on the card or a parent element.

```blade preview
<x-ux::card class="w-full max-w-sm" dir="rtl">
    <x-ux::card.header>
        <x-ux::card.title>تسجيل الدخول إلى حسابك</x-ux::card.title>
        <x-ux::card.description>
            أدخل بريدك الإلكتروني أدناه لتسجيل الدخول إلى حسابك
        </x-ux::card.description>
        <x-ux::card.action>
            <x-ux::button variant="link">إنشاء حساب</x-ux::button>
        </x-ux::card.action>
    </x-ux::card.header>
    <x-ux::card.content>
        <form>
            <div class="flex flex-col gap-6">
                <div class="grid gap-2">
                    <x-ux::label for="email-rtl">البريد الإلكتروني</x-ux::label>
                    <x-ux::input id="email-rtl" type="email" placeholder="m@example.com" required />
                </div>
                <div class="grid gap-2">
                    <div class="flex items-center">
                        <x-ux::label for="password-rtl">كلمة المرور</x-ux::label>
                        <a href="#" class="ms-auto inline-block text-sm underline-offset-4 hover:underline">
                            نسيت كلمة المرور؟
                        </a>
                    </div>
                    <x-ux::input id="password-rtl" type="password" required />
                </div>
            </div>
        </form>
    </x-ux::card.content>
    <x-ux::card.footer class="flex-col gap-2">
        <x-ux::button type="submit" class="w-full">تسجيل الدخول</x-ux::button>
        <x-ux::button variant="outline" class="w-full">تسجيل الدخول باستخدام Google</x-ux::button>
    </x-ux::card.footer>
</x-ux::card>
```

## API Reference

| Prop   | Type                         | Default     |
|--------|------------------------------|-------------|
| `size` | `enum` [?"default" \| "sm"] | `"default"` |

## Publishing

This component works out of the box, but you can publish its Blade views if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-card --force
```
