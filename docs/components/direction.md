# Direction

A provider component that sets the text direction for your application.

The `x-ux::direction` component sets the text direction (`ltr` or `rtl`) for its content.

Here's a preview in RTL mode. To see more examples, look for the RTL section on component pages.

```blade preview
<x-ux::direction direction="rtl">
    <x-ux::card class="w-full max-w-sm">
        <x-ux::card.header>
            <x-ux::card.title>تسجيل الدخول إلى حسابك</x-ux::card.title>
            <x-ux::card.description>أدخل بريدك الإلكتروني أدناه لتسجيل الدخول إلى حسابك</x-ux::card.description>
            <x-ux::card.action><x-ux::button variant="link">إنشاء حساب</x-ux::button></x-ux::card.action>
        </x-ux::card.header>
        <x-ux::card.content>
            <form>
                <div class="flex flex-col gap-6">
                    <div class="grid gap-2">
                        <x-ux::label for="direction-email">البريد الإلكتروني</x-ux::label>
                        <x-ux::input id="direction-email" type="email" placeholder="m@example.com" required />
                    </div>
                    <div class="grid gap-2">
                        <div class="flex items-center">
                            <x-ux::label for="direction-password">كلمة المرور</x-ux::label>
                            <a href="#" class="ms-auto inline-block text-sm underline-offset-4 hover:underline">نسيت كلمة المرور؟</a>
                        </div>
                        <x-ux::input id="direction-password" type="password" required />
                    </div>
                </div>
            </form>
        </x-ux::card.content>
        <x-ux::card.footer class="flex-col gap-2">
            <x-ux::button type="submit" class="w-full">تسجيل الدخول</x-ux::button>
            <x-ux::button variant="outline" class="w-full">تسجيل الدخول باستخدام Google</x-ux::button>
        </x-ux::card.footer>
    </x-ux::card>
</x-ux::direction>
```

## Usage

```blade
<html dir="rtl">
    <body>
        <x-ux::direction direction="rtl">
            {{-- Your app content --}}
        </x-ux::direction>
    </body>
</html>
```

Set `dir` on `<html>` as well when the entire document uses one direction. The provider supplies the direction to component behavior and preserves it for content teleported to `body`.

## API Reference

| Prop        | Type                         | Default |
|-------------|------------------------------|---------|
| `direction` | `enum` [?"ltr" \| "rtl"] | `"ltr"` |

## Publishing

```shell
php artisan vendor:publish --tag=ux-direction --force
```
