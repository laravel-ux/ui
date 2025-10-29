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
        <x-ux::button type="submit" class="w-full">
            Login
        </x-ux::button>
        <x-ux::button variant="outline" class="w-full">
            Login with Google
        </x-ux::button>
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

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-card --force
```

