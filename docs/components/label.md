# Label

Renders an accessible label associated with controls.

```blade preview
<div class="flex items-center gap-2">
    <x-ux::checkbox id="terms" />
    <x-ux::label for="terms">Accept terms and conditions</x-ux::label>
</div>
```

For form fields, use `x-ux::field`, which includes label, description, and error components.

## Usage

```blade
<x-ux::label for="email">Your email address</x-ux::label>
```

## Label in Field

For form fields, use `x-ux::field`, which includes built-in `x-ux::field.label`, `x-ux::field.description`, and `x-ux::field.error` components.

```blade preview
<div class="w-full max-w-md">
    <x-ux::field.group>
        <x-ux::field.set>
            <x-ux::field.legend>Payment Method</x-ux::field.legend>
            <x-ux::field.description>
                All transactions are secure and encrypted
            </x-ux::field.description>
            <x-ux::field.group>
                <x-ux::field>
                    <x-ux::field.label for="label-card-name">Name on Card</x-ux::field.label>
                    <x-ux::input id="label-card-name" placeholder="Evil Rabbit" />
                </x-ux::field>
                <x-ux::field>
                    <x-ux::field.label for="label-card-number">Card Number</x-ux::field.label>
                    <x-ux::input id="label-card-number" placeholder="1234 5678 9012 3456" />
                    <x-ux::field.description>
                        Enter your 16-digit card number
                    </x-ux::field.description>
                </x-ux::field>
                <div class="grid grid-cols-3 gap-4">
                    <x-ux::field>
                        <x-ux::field.label for="label-exp-month">Month</x-ux::field.label>
                        <x-ux::select>
                            <x-ux::select.trigger id="label-exp-month">
                                <x-ux::select.value placeholder="MM" />
                            </x-ux::select.trigger>
                            <x-ux::select.content>
                                @foreach (range(1, 12) as $month)
                                    <x-ux::select.item :value="str_pad($month, 2, '0', STR_PAD_LEFT)">
                                        {{ str_pad($month, 2, '0', STR_PAD_LEFT) }}
                                    </x-ux::select.item>
                                @endforeach
                            </x-ux::select.content>
                        </x-ux::select>
                    </x-ux::field>
                    <x-ux::field>
                        <x-ux::field.label for="label-exp-year">Year</x-ux::field.label>
                        <x-ux::select>
                            <x-ux::select.trigger id="label-exp-year">
                                <x-ux::select.value placeholder="YYYY" />
                            </x-ux::select.trigger>
                            <x-ux::select.content>
                                @foreach (range(2026, 2031) as $year)
                                    <x-ux::select.item :value="$year">{{ $year }}</x-ux::select.item>
                                @endforeach
                            </x-ux::select.content>
                        </x-ux::select>
                    </x-ux::field>
                    <x-ux::field>
                        <x-ux::field.label for="label-cvv">CVV</x-ux::field.label>
                        <x-ux::input id="label-cvv" placeholder="123" />
                    </x-ux::field>
                </div>
            </x-ux::field.group>
        </x-ux::field.set>
        <x-ux::field.separator />
        <x-ux::field.set>
            <x-ux::field.legend>Billing Address</x-ux::field.legend>
            <x-ux::field.description>
                The billing address associated with your payment method
            </x-ux::field.description>
            <x-ux::field.group>
                <x-ux::field orientation="horizontal">
                    <x-ux::checkbox id="label-same-as-shipping" checked />
                    <x-ux::field.label for="label-same-as-shipping" class="font-normal">
                        Same as shipping address
                    </x-ux::field.label>
                </x-ux::field>
            </x-ux::field.group>
        </x-ux::field.set>
        <x-ux::field.set>
            <x-ux::field.group>
                <x-ux::field>
                    <x-ux::field.label for="label-comments">Comments</x-ux::field.label>
                    <x-ux::textarea
                        id="label-comments"
                        placeholder="Add any additional comments"
                        class="resize-none"
                    />
                </x-ux::field>
            </x-ux::field.group>
        </x-ux::field.set>
        <x-ux::field orientation="horizontal">
            <x-ux::button>Submit</x-ux::button>
            <x-ux::button variant="outline">Cancel</x-ux::button>
        </x-ux::field>
    </x-ux::field.group>
</div>
```

## RTL

```blade preview
<div class="flex items-center gap-2" dir="rtl">
        <x-ux::checkbox id="label-terms-rtl" />
        <x-ux::label for="label-terms-rtl">قبول الشروط والأحكام</x-ux::label>
</div>
```

## Publishing

```shell
php artisan vendor:publish --tag=ux-label --force
```
