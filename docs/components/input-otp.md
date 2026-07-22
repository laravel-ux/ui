# Input OTP

An accessible one-time password input with copy-and-paste support.

```blade preview
<x-ux::input-otp :length="6" value="123456">
    <x-ux::input-otp.group>
        @foreach (range(0, 5) as $index)
            <x-ux::input-otp.slot :index="$index" />
        @endforeach
    </x-ux::input-otp.group>
</x-ux::input-otp>
```

## Usage

```blade
<x-ux::input-otp :length="6">
    <x-ux::input-otp.group>
        <x-ux::input-otp.slot :index="0" />
        <x-ux::input-otp.slot :index="1" />
        <x-ux::input-otp.slot :index="2" />
    </x-ux::input-otp.group>
    <x-ux::input-otp.separator />
    <x-ux::input-otp.group>
        <x-ux::input-otp.slot :index="3" />
        <x-ux::input-otp.slot :index="4" />
        <x-ux::input-otp.slot :index="5" />
    </x-ux::input-otp.group>
</x-ux::input-otp>
```

## Composition

```text
x-ux::input-otp
├── x-ux::input-otp.group
│   └── x-ux::input-otp.slot
├── x-ux::input-otp.separator
└── x-ux::input-otp.group
    └── x-ux::input-otp.slot
```

## Pattern

Use `pattern` to restrict each entered character. Pass a regular expression source without surrounding slashes.

```blade preview
<x-ux::field class="w-fit">
    <x-ux::field.label for="input-otp-digits">Digits Only</x-ux::field.label>
    <x-ux::input-otp id="input-otp-digits" :length="6" pattern="[0-9]">
        <x-ux::input-otp.group>
            @foreach (range(0, 5) as $index)
                <x-ux::input-otp.slot :index="$index" />
            @endforeach
        </x-ux::input-otp.group>
    </x-ux::input-otp>
</x-ux::field>
```

## Separator

```blade preview
<x-ux::input-otp :length="6">
    @foreach ([0, 2, 4] as $start)
        <x-ux::input-otp.group>
            <x-ux::input-otp.slot :index="$start" />
            <x-ux::input-otp.slot :index="$start + 1" />
        </x-ux::input-otp.group>
        @if ($start < 4)
            <x-ux::input-otp.separator />
        @endif
    @endforeach
</x-ux::input-otp>
```

## Disabled

```blade preview
<x-ux::input-otp :length="6" value="123456" disabled>
    <x-ux::input-otp.group>
        <x-ux::input-otp.slot :index="0" />
        <x-ux::input-otp.slot :index="1" />
        <x-ux::input-otp.slot :index="2" />
    </x-ux::input-otp.group>
    <x-ux::input-otp.separator />
    <x-ux::input-otp.group>
        <x-ux::input-otp.slot :index="3" />
        <x-ux::input-otp.slot :index="4" />
        <x-ux::input-otp.slot :index="5" />
    </x-ux::input-otp.group>
</x-ux::input-otp>
```

## Controlled

Use `x-model` for client-side state or `wire:model` for Livewire state.

```blade preview
<div x-data="{ code: '' }" class="space-y-2">
    <x-ux::input-otp :length="6" x-model="code">
        <x-ux::input-otp.group>
            @foreach (range(0, 5) as $index)
                <x-ux::input-otp.slot :index="$index" />
            @endforeach
        </x-ux::input-otp.group>
    </x-ux::input-otp>
    <div class="text-center text-sm" x-text="code ? `You entered: ${code}` : 'Enter your verification code.'"></div>
</div>
```

## Invalid

```blade preview
<x-ux::input-otp :length="6" value="000000" aria-invalid="true">
    <x-ux::input-otp.group>
        <x-ux::input-otp.slot :index="0" />
        <x-ux::input-otp.slot :index="1" />
    </x-ux::input-otp.group>
    <x-ux::input-otp.separator />
    <x-ux::input-otp.group>
        <x-ux::input-otp.slot :index="2" />
        <x-ux::input-otp.slot :index="3" />
    </x-ux::input-otp.group>
    <x-ux::input-otp.separator />
    <x-ux::input-otp.group>
        <x-ux::input-otp.slot :index="4" />
        <x-ux::input-otp.slot :index="5" />
    </x-ux::input-otp.group>
</x-ux::input-otp>
```

## Four Digits

```blade preview
<x-ux::input-otp :length="4" pattern="[0-9]">
    <x-ux::input-otp.group>
        @foreach (range(0, 3) as $index)
            <x-ux::input-otp.slot :index="$index" />
        @endforeach
    </x-ux::input-otp.group>
</x-ux::input-otp>
```

## Alphanumeric

```blade preview
<x-ux::input-otp :length="6" pattern="[A-Za-z0-9]" inputmode="text">
    <x-ux::input-otp.group>
        <x-ux::input-otp.slot :index="0" />
        <x-ux::input-otp.slot :index="1" />
        <x-ux::input-otp.slot :index="2" />
    </x-ux::input-otp.group>
    <x-ux::input-otp.separator />
    <x-ux::input-otp.group>
        <x-ux::input-otp.slot :index="3" />
        <x-ux::input-otp.slot :index="4" />
        <x-ux::input-otp.slot :index="5" />
    </x-ux::input-otp.group>
</x-ux::input-otp>
```

## Form

```blade preview
<x-ux::card size="sm" class="mx-auto w-full max-w-xs">
    <x-ux::card.header>
        <x-ux::card.title>Verify your login</x-ux::card.title>
        <x-ux::card.description>
            Enter the verification code sent to <span class="font-medium">taylor@laravel.com</span>.
        </x-ux::card.description>
    </x-ux::card.header>
    <x-ux::card.content>
        <x-ux::field>
            <div class="flex items-center justify-between">
                <x-ux::field.label for="otp-verification">Verification code</x-ux::field.label>
                <x-ux::button variant="outline" size="xs">
                    <x-ux::icon name="refresh-cw" />
                    Resend Code
                </x-ux::button>
            </div>
            <div class="flex justify-center">
                <x-ux::input-otp id="otp-verification" :length="6" wire:model="verificationCode" required>
                    <x-ux::input-otp.group class="*:data-[slot=input-otp-slot]:size-10 *:data-[slot=input-otp-slot]:text-lg">
                        <x-ux::input-otp.slot :index="0" />
                        <x-ux::input-otp.slot :index="1" />
                        <x-ux::input-otp.slot :index="2" />
                    </x-ux::input-otp.group>
                    <x-ux::input-otp.separator class="mx-1" />
                    <x-ux::input-otp.group class="*:data-[slot=input-otp-slot]:size-10 *:data-[slot=input-otp-slot]:text-lg">
                        <x-ux::input-otp.slot :index="3" />
                        <x-ux::input-otp.slot :index="4" />
                        <x-ux::input-otp.slot :index="5" />
                    </x-ux::input-otp.group>
                </x-ux::input-otp>
            </div>
            <x-ux::field.description class="text-center">I no longer have access to this email address.</x-ux::field.description>
        </x-ux::field>
    </x-ux::card.content>
    <x-ux::card.footer>
        <x-ux::button type="submit" class="w-full">Verify</x-ux::button>
    </x-ux::card.footer>
</x-ux::card>
```

## RTL

```blade preview
<x-ux::direction direction="rtl">
    <x-ux::field class="mx-auto w-fit">
        <x-ux::field.label for="input-otp-rtl">رمز التحقق</x-ux::field.label>
        <x-ux::input-otp id="input-otp-rtl" :length="6" value="123456" dir="rtl">
            <x-ux::input-otp.group>
                @foreach (range(0, 5) as $index)
                    <x-ux::input-otp.slot :index="$index" />
                @endforeach
            </x-ux::input-otp.group>
        </x-ux::input-otp>
    </x-ux::field>
</x-ux::direction>
```

## API Reference

### x-ux::input-otp

| Prop       | Type      | Default |
|------------|-----------|---------|
| `length*`  | `integer` | —       |
| `pattern`  | `string`  | `null`  |

### x-ux::input-otp.slot

| Prop      | Type      | Default |
|-----------|-----------|---------|
| `index*`  | `integer` | —       |

## Publishing

```shell
php artisan vendor:publish --tag=ux-input-otp --force
```
