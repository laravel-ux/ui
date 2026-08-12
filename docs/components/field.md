# Field

Combine labels, controls, and help text to compose accessible form fields and grouped inputs.

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
                    <x-ux::field.label for="checkout-7j9-card-name-43j">
                        Name on Card
                    </x-ux::field.label>
                    <x-ux::input
                        id="checkout-7j9-card-name-43j"
                        placeholder="Evil Rabbit"
                    />
                </x-ux::field>
                <x-ux::field>
                    <x-ux::field.label for="checkout-7j9-card-number-uw1">
                        Card Number
                    </x-ux::field.label>
                    <x-ux::input
                        id="checkout-7j9-card-number-uw1"
                        placeholder="1234 5678 9012 3456"
                    />
                    <x-ux::field.description>
                        Enter your 16-digit card number
                    </x-ux::field.description>
                </x-ux::field>
                <div class="grid grid-cols-3 gap-4">
                    <x-ux::field>
                        <x-ux::field.label for="checkout-exp-month-ts6">
                            Month
                        </x-ux::field.label>
                        <x-ux::select>
                            <x-ux::select.trigger id="checkout-exp-month-ts6">
                                <x-ux::select.value placeholder="MM" />
                            </x-ux::select.trigger>
                            <x-ux::select.content>
                                <x-ux::select.item value="01">01</x-ux::select.item>
                                <x-ux::select.item value="02">02</x-ux::select.item>
                                <x-ux::select.item value="03">03</x-ux::select.item>
                                <x-ux::select.item value="04">04</x-ux::select.item>
                                <x-ux::select.item value="05">05</x-ux::select.item>
                                <x-ux::select.item value="06">06</x-ux::select.item>
                                <x-ux::select.item value="07">07</x-ux::select.item>
                                <x-ux::select.item value="08">08</x-ux::select.item>
                                <x-ux::select.item value="09">09</x-ux::select.item>
                                <x-ux::select.item value="10">10</x-ux::select.item>
                                <x-ux::select.item value="11">11</x-ux::select.item>
                                <x-ux::select.item value="12">12</x-ux::select.item>
                            </x-ux::select.content>
                        </x-ux::select>
                    </x-ux::field>
                    <x-ux::field>
                        <x-ux::field.label for="checkout-7j9-exp-year-f59">
                            Year
                        </x-ux::field.label>
                        <x-ux::select>
                            <x-ux::select.trigger id="checkout-7j9-exp-year-f59">
                                <x-ux::select.value placeholder="YYYY" />
                            </x-ux::select.trigger>
                            <x-ux::select.content>
                                <x-ux::select.item value="2024">2024</x-ux::select.item>
                                <x-ux::select.item value="2025">2025</x-ux::select.item>
                                <x-ux::select.item value="2026">2026</x-ux::select.item>
                                <x-ux::select.item value="2027">2027</x-ux::select.item>
                                <x-ux::select.item value="2028">2028</x-ux::select.item>
                                <x-ux::select.item value="2029">2029</x-ux::select.item>
                            </x-ux::select.content>
                        </x-ux::select>
                    </x-ux::field>
                    <x-ux::field>
                        <x-ux::field.label for="checkout-7j9-cvv">CVV</x-ux::field.label>
                        <x-ux::input id="checkout-7j9-cvv" placeholder="123" />
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
                    <x-ux::checkbox
                        id="checkout-7j9-same-as-shipping-wgm"
                        checked
                    />
                    <x-ux::field.label
                        for="checkout-7j9-same-as-shipping-wgm"
                        class="font-normal"
                    >
                        Same as shipping address
                    </x-ux::field.label>
                </x-ux::field>
            </x-ux::field.group>
        </x-ux::field.set>
        <x-ux::field.set>
            <x-ux::field.group>
                <x-ux::field>
                    <x-ux::field.label for="checkout-7j9-optional-comments">
                        Comments
                    </x-ux::field.label>
                    <x-ux::textarea
                        id="checkout-7j9-optional-comments"
                        placeholder="Add any additional comments"
                        class="resize-none"
                    />
                </x-ux::field>
            </x-ux::field.group>
        </x-ux::field.set>
        <x-ux::field orientation="horizontal">
            <x-ux::button>
                Submit
            </x-ux::button>
            <x-ux::button variant="outline">
                Cancel
            </x-ux::button>
        </x-ux::field>
    </x-ux::field.group>
</div>
```

## Usage

```blade
<x-ux::field.set>
    <x-ux::field.legend>Profile</x-ux::field.legend>
    <x-ux::field.description>This appears on invoices and emails.</x-ux::field.description>
    <x-ux::field.group>
        <x-ux::field>
            <x-ux::field.label for="name">Full name</x-ux::field.label>
            <x-ux::input id="name" autoComplete="off" placeholder="Evil Rabbit" />
            <x-ux::field.description>This appears on invoices and emails.</x-ux::field.description>
        </x-ux::field>
        <x-ux::field>
            <x-ux::field.label for="username">Username</x-ux::field.label>
            <x-ux::input id="username" autoComplete="off" aria-invalid />
            <x-ux::field.error>Choose another username.</x-ux::field.error>
        </x-ux::field>
        <x-ux::field orientation="horizontal">
            <x-ux::switch id="newsletter" />
            <x-ux::field.label for="newsletter">Subscribe to the newsletter</x-ux::field.label>
        </x-ux::field>
    </x-ux::field.group>
</x-ux::field.set>
```

## Composition

### x-ux::field

```text
x-ux::field
├── x-ux::field.label
├── x-ux::input / x-ux::textarea / x-ux::switch / x-ux::select
├── x-ux::field.description
└── x-ux::field.error
```

### x-ux::field.group

```text
x-ux::field.group
├── x-ux::field
├── x-ux::field.separator
└── x-ux::field
```

### x-ux::field.set

```text
x-ux::field.set
├── x-ux::field.legend
├── x-ux::field.description
└── x-ux::field.group
    └── x-ux::field
```

## Anatomy

```blade
<x-ux::field>
    <x-ux::field.label for="input-id">Label</x-ux::field.label>
    <x-ux::input id="input-id" />
    <x-ux::field.description>Optional helper text.</x-ux::field.description>
    <x-ux::field.error>Validation message.</x-ux::field.error>
</x-ux::field>
```

## Examples

### Input

```blade preview
<div class="w-full max-w-xs">
    <x-ux::field.set>
        <x-ux::field.group>
            <x-ux::field>
                <x-ux::field.label for="username">Username</x-ux::field.label>
                <x-ux::input id="username" type="text" placeholder="Max Leiter" />
                <x-ux::field.description>
                    Choose a unique username for your account.
                </x-ux::field.description>
            </x-ux::field>
            <x-ux::field>
                <x-ux::field.label for="password">Password</x-ux::field.label>
                <x-ux::field.description>
                    Must be at least 8 characters long.
                </x-ux::field.description>
                <x-ux::input id="password" type="password" placeholder="********" />
            </x-ux::field>
        </x-ux::field.group>
    </x-ux::field.set>
</div>
```

### Textarea

```blade preview
<div class="w-full max-w-xs">
    <x-ux::field.set>
        <x-ux::field.group>
            <x-ux::field>
                <x-ux::field.label for="feedback">
                    Feedback
                </x-ux::field.label>
                <x-ux::textarea
                    id="feedback"
                    placeholder="Your feedback helps us improve..."
                    rows="4"
                />
                <x-ux::field.description>
                    Share your thoughts about our service.
                </x-ux::field.description>
            </x-ux::field>
        </x-ux::field.group>
    </x-ux::field.set>
</div>
```

### Select

```blade preview
<div class="w-full max-w-xs">
    <x-ux::field>
        <x-ux::field.label>
            Department
        </x-ux::field.label>
        <x-ux::select>
            <x-ux::select.trigger>
                <x-ux::select.value placeholder="Choose department" />
            </x-ux::select.trigger>
            <x-ux::select.content>
                <x-ux::select.item value="engineering">Engineering</x-ux::select.item>
                <x-ux::select.item value="design">Design</x-ux::select.item>
                <x-ux::select.item value="marketing">Marketing</x-ux::select.item>
                <x-ux::select.item value="sales">Sales</x-ux::select.item>
                <x-ux::select.item value="support">Customer Support</x-ux::select.item>
                <x-ux::select.item value="hr">Human Resources</x-ux::select.item>
                <x-ux::select.item value="finance">Finance</x-ux::select.item>
                <x-ux::select.item value="operations">Operations</x-ux::select.item>
            </x-ux::select.content>
        </x-ux::select>
        <x-ux::field.description>
            Select your department or area of work.
        </x-ux::field.description>
    </x-ux::field>
</div>
```

### Slider

```blade preview
<div x-data="{ priceRange: [200, 800] }" class="w-full max-w-xs">
    <x-ux::field>
        <x-ux::field.title>Price Range</x-ux::field.title>
        <x-ux::field.description>
            Set your budget range
            ($<span class="font-medium tabular-nums" x-text="priceRange[0]"></span>
            - <span class="font-medium tabular-nums" x-text="priceRange[1]"></span>).
        </x-ux::field.description>
        <x-ux::slider
            x-model="priceRange"
            :min="0"
            :max="1000"
            :step="10"
            aria-label="Price Range"
            class="mt-2 w-full"
        />
    </x-ux::field>
</div>
```

### Fieldset

```blade preview
<div class="w-full max-w-sm">
    <x-ux::field.set>
        <x-ux::field.legend>Address Information</x-ux::field.legend>
        <x-ux::field.description>
            We need your address to deliver your order.
        </x-ux::field.description>
        <x-ux::field.group>
            <x-ux::field>
                <x-ux::field.label for="street">Street Address</x-ux::field.label>
                <x-ux::input id="street" type="text" placeholder="123 Main St" />
            </x-ux::field>
            <div class="grid grid-cols-2 gap-4">
                <x-ux::field>
                    <x-ux::field.label for="city">City</x-ux::field.label>
                    <x-ux::input id="city" type="text" placeholder="New York" />
                </x-ux::field>
                <x-ux::field>
                    <x-ux::field.label for="zip">Postal Code</x-ux::field.label>
                    <x-ux::input id="zip" type="text" placeholder="90502" />
                </x-ux::field>
            </div>
        </x-ux::field.group>
    </x-ux::field.set>
</div>
```

### Checkbox

```blade preview
<div class="w-full max-w-xs">
    <x-ux::field.group>
        <x-ux::field.set>
            <x-ux::field.legend variant="label">
                Show these items on the desktop
            </x-ux::field.legend>
            <x-ux::field.description>
                Select the items you want to show on the desktop.
            </x-ux::field.description>
            <x-ux::field.group class="gap-3">
                <x-ux::field orientation="horizontal">
                    <x-ux::checkbox id="finder-pref-9k2-hard-disks-ljj" checked />
                    <x-ux::field.label
                        for="finder-pref-9k2-hard-disks-ljj"
                        class="font-normal"
                    >
                        Hard disks
                    </x-ux::field.label>
                </x-ux::field>
                <x-ux::field orientation="horizontal">
                    <x-ux::checkbox id="finder-pref-9k2-external-disks-1yg" />
                    <x-ux::field.label
                        for="finder-pref-9k2-external-disks-1yg"
                        class="font-normal"
                    >
                        External disks
                    </x-ux::field.label>
                </x-ux::field>
                <x-ux::field orientation="horizontal">
                    <x-ux::checkbox id="finder-pref-9k2-cds-dvds-fzt" />
                    <x-ux::field.label
                        for="finder-pref-9k2-cds-dvds-fzt"
                        class="font-normal"
                    >
                        CDs, DVDs, and iPods
                    </x-ux::field.label>
                </x-ux::field>
                <x-ux::field orientation="horizontal">
                    <x-ux::checkbox id="finder-pref-9k2-connected-servers-6l2" />
                    <x-ux::field.label
                        for="finder-pref-9k2-connected-servers-6l2"
                        class="font-normal"
                    >
                        Connected servers
                    </x-ux::field.label>
                </x-ux::field>
            </x-ux::field.group>
        </x-ux::field.set>
        <x-ux::field.separator />
        <x-ux::field orientation="horizontal">
            <x-ux::checkbox id="finder-pref-9k2-sync-folders-nep" checked />
            <x-ux::field.content>
                <x-ux::field.label for="finder-pref-9k2-sync-folders-nep">
                    Sync Desktop & Documents folders
                </x-ux::field.label>
                <x-ux::field.description>
                    Your Desktop & Documents folders are being synced with iCloud Drive. You can access them from other devices.
                </x-ux::field.description>
            </x-ux::field.content>
        </x-ux::field>
    </x-ux::field.group>
</div>
```

### Radio

```blade preview
<div class="w-full max-w-xs">
    <x-ux::field.set>
        <x-ux::field.legend variant="label">Subscription Plan</x-ux::field.legend>
        <x-ux::field.description>
            Yearly and lifetime plans offer significant savings.
        </x-ux::field.description>
        <x-ux::radio-group value="monthly">
            <x-ux::field orientation="horizontal">
                <x-ux::radio-group.item value="monthly" id="plan-monthly" />
                <x-ux::field.label for="plan-monthly" class="font-normal">
                    Monthly ($9.99/month)
                </x-ux::field.label>
            </x-ux::field>
            <x-ux::field orientation="horizontal">
                <x-ux::radio-group.item value="yearly" id="plan-yearly" />
                <x-ux::field.label for="plan-yearly" class="font-normal">
                    Yearly ($99.99/year)
                </x-ux::field.label>
            </x-ux::field>
            <x-ux::field orientation="horizontal">
                <x-ux::radio-group.item value="lifetime" id="plan-lifetime" />
                <x-ux::field.label for="plan-lifetime" class="font-normal">
                    Lifetime ($299.99)
                </x-ux::field.label>
            </x-ux::field>
        </x-ux::radio-group>
    </x-ux::field.set>
</div>
```

### Switch

```blade preview
<div class="w-fit">
    <x-ux::field orientation="horizontal" class="w-fit">
        <x-ux::field.label for="2fa">Multi-factor authentication</x-ux::field.label>
        <x-ux::switch id="2fa" />
    </x-ux::field>
</div>
```

### Choice Card

Wrap `x-ux::field` components inside `x-ux::field.label` to create selectable field groups.
This works with `x-ux::radio-group.item`, `x-ux::checkbox` and `x-ux::switch` components.

```blade preview
<div class="w-full max-w-xs">
    <x-ux::field.group>
        <x-ux::field.set>
            <x-ux::field.legend variant="label">
                Compute Environment
            </x-ux::field.legend>
            <x-ux::field.description>
                Select the compute environment for your cluster.
            </x-ux::field.description>
            <x-ux::radio-group value="kubernetes">
                <x-ux::field.label for="kubernetes-r2h">
                    <x-ux::field orientation="horizontal">
                        <x-ux::field.content>
                            <x-ux::field.title>Kubernetes</x-ux::field.title>
                            <x-ux::field.description>
                                Run GPU workloads on a K8s cluster.
                            </x-ux::field.description>
                        </x-ux::field.content>
                        <x-ux::radio-group.item value="kubernetes" id="kubernetes-r2h" />
                    </x-ux::field>
                </x-ux::field.label>
                <x-ux::field.label for="vm-z4k">
                    <x-ux::field orientation="horizontal">
                        <x-ux::field.content>
                            <x-ux::field.title>Virtual Machine</x-ux::field.title>
                            <x-ux::field.description>
                                Access a cluster to run GPU workloads.
                            </x-ux::field.description>
                        </x-ux::field.content>
                        <x-ux::radio-group.item value="vm" id="vm-z4k" />
                    </x-ux::field>
                </x-ux::field.label>
            </x-ux::radio-group>
        </x-ux::field.set>
    </x-ux::field.group>
</div>
```

### Field Group

Stack `x-ux::field` components with `x-ux::field.group`. Add `x-ux::field.separator` to divide them.

```blade preview
<div class="w-full max-w-xs">
    <x-ux::field.group>
        <x-ux::field.set>
            <x-ux::field.label>Responses</x-ux::field.label>
            <x-ux::field.description>
                Get notified when ChatGPT responds to requests that take time, like research or image generation.
            </x-ux::field.description>
            <x-ux::field.group data-slot="checkbox-group">
                <x-ux::field orientation="horizontal">
                    <x-ux::checkbox id="push" checked disabled />
                    <x-ux::field.label for="push" class="font-normal">
                        Push notifications
                    </x-ux::field.label>
                </x-ux::field>
            </x-ux::field.group>
        </x-ux::field.set>
        <x-ux::field.separator />
        <x-ux::field.set>
            <x-ux::field.label>Tasks</x-ux::field.label>
            <x-ux::field.description>
                Get notified when tasks you&apos;ve created have updates. <a href="#">Manage tasks</a>
            </x-ux::field.description>
            <x-ux::field.group data-slot="checkbox-group">
                <x-ux::field orientation="horizontal">
                    <x-ux::checkbox id="push-tasks" />
                    <x-ux::field.label for="push-tasks" class="font-normal">
                        Push notifications
                    </x-ux::field.label>
                </x-ux::field>
                <x-ux::field orientation="horizontal">
                    <x-ux::checkbox id="email-tasks" />
                    <x-ux::field.label for="email-tasks" class="font-normal">
                        Email notifications
                    </x-ux::field.label>
                </x-ux::field>
            </x-ux::field.group>
        </x-ux::field.set>
    </x-ux::field.group>
</div>
```

## RTL

```blade preview
<x-ux::direction direction="rtl">
    <div class="w-full max-w-md py-6">
        <x-ux::field.group>
            <x-ux::field.set>
                <x-ux::field.legend>طريقة الدفع</x-ux::field.legend>
                <x-ux::field.description>جميع المعاملات آمنة ومشفرة</x-ux::field.description>
                <x-ux::field.group>
                    <x-ux::field>
                        <x-ux::field.label for="checkout-card-name-rtl">الاسم على البطاقة</x-ux::field.label>
                        <x-ux::input id="checkout-card-name-rtl" placeholder="Evil Rabbit" required />
                    </x-ux::field>
                    <x-ux::field>
                        <x-ux::field.label for="checkout-card-number-rtl">رقم البطاقة</x-ux::field.label>
                        <x-ux::input id="checkout-card-number-rtl" placeholder="1234 5678 9012 3456" required />
                        <x-ux::field.description>أدخل رقم البطاقة المكون من 16 رقمًا</x-ux::field.description>
                    </x-ux::field>
                    <div class="grid grid-cols-3 gap-4">
                        <x-ux::field>
                            <x-ux::field.label for="checkout-month-rtl">الشهر</x-ux::field.label>
                            <x-ux::select>
                                <x-ux::select.trigger id="checkout-month-rtl">
                                    <x-ux::select.value placeholder="ش.ش" />
                                </x-ux::select.trigger>
                                <x-ux::select.content>
                                    <x-ux::select.group>
                                        <x-ux::select.item value="01">٠١</x-ux::select.item>
                                        <x-ux::select.item value="02">٠٢</x-ux::select.item>
                                        <x-ux::select.item value="03">٠٣</x-ux::select.item>
                                        <x-ux::select.item value="04">٠٤</x-ux::select.item>
                                        <x-ux::select.item value="05">٠٥</x-ux::select.item>
                                        <x-ux::select.item value="06">٠٦</x-ux::select.item>
                                        <x-ux::select.item value="07">٠٧</x-ux::select.item>
                                        <x-ux::select.item value="08">٠٨</x-ux::select.item>
                                        <x-ux::select.item value="09">٠٩</x-ux::select.item>
                                        <x-ux::select.item value="10">١٠</x-ux::select.item>
                                        <x-ux::select.item value="11">١١</x-ux::select.item>
                                        <x-ux::select.item value="12">١٢</x-ux::select.item>
                                    </x-ux::select.group>
                                </x-ux::select.content>
                            </x-ux::select>
                        </x-ux::field>
                        <x-ux::field>
                            <x-ux::field.label for="checkout-year-rtl">السنة</x-ux::field.label>
                            <x-ux::select>
                                <x-ux::select.trigger id="checkout-year-rtl">
                                    <x-ux::select.value placeholder="YYYY" />
                                </x-ux::select.trigger>
                                <x-ux::select.content>
                                    <x-ux::select.group>
                                        <x-ux::select.item value="2024">2024</x-ux::select.item>
                                        <x-ux::select.item value="2025">2025</x-ux::select.item>
                                        <x-ux::select.item value="2026">2026</x-ux::select.item>
                                        <x-ux::select.item value="2027">2027</x-ux::select.item>
                                        <x-ux::select.item value="2028">2028</x-ux::select.item>
                                        <x-ux::select.item value="2029">2029</x-ux::select.item>
                                    </x-ux::select.group>
                                </x-ux::select.content>
                            </x-ux::select>
                        </x-ux::field>
                        <x-ux::field>
                            <x-ux::field.label for="checkout-cvv-rtl">CVV</x-ux::field.label>
                            <x-ux::input id="checkout-cvv-rtl" placeholder="123" required />
                        </x-ux::field>
                    </div>
                </x-ux::field.group>
            </x-ux::field.set>
            <x-ux::field.separator />
            <x-ux::field.set>
                <x-ux::field.legend>عنوان الفوترة</x-ux::field.legend>
                <x-ux::field.description>عنوان الفوترة المرتبط بطريقة الدفع الخاصة بك</x-ux::field.description>
                <x-ux::field.group>
                    <x-ux::field orientation="horizontal">
                        <x-ux::checkbox id="same-as-shipping-rtl" checked />
                        <x-ux::field.label for="same-as-shipping-rtl" class="font-normal">
                            نفس عنوان الشحن
                        </x-ux::field.label>
                    </x-ux::field>
                </x-ux::field.group>
            </x-ux::field.set>
            <x-ux::field.set>
                <x-ux::field.group>
                    <x-ux::field>
                        <x-ux::field.label for="comments-rtl">تعليقات</x-ux::field.label>
                        <x-ux::textarea id="comments-rtl" placeholder="أضف أي تعليقات إضافية" class="resize-none" />
                    </x-ux::field>
                </x-ux::field.group>
            </x-ux::field.set>
            <x-ux::field orientation="horizontal">
                <x-ux::button type="submit">إرسال</x-ux::button>
                <x-ux::button type="button" variant="outline">إلغاء</x-ux::button>
            </x-ux::field>
        </x-ux::field.group>
    </div>
</x-ux::direction>
```

## Responsive Layout

- The default `vertical` orientation stacks the label, control, and supporting text.
- Use `horizontal` to align a control with its label or with `x-ux::field.content`.
- Use `responsive` inside `x-ux::field.group` to switch from vertical to horizontal at its container breakpoint.

```blade preview
<div class="w-full max-w-lg">
    <x-ux::field.set>
        <x-ux::field.legend>Profile</x-ux::field.legend>
        <x-ux::field.description>Fill in your profile information.</x-ux::field.description>
        <x-ux::field.group>
            <x-ux::field orientation="responsive">
                <x-ux::field.content>
                    <x-ux::field.label for="responsive-name">Name</x-ux::field.label>
                    <x-ux::field.description>Provide your full name for identification</x-ux::field.description>
                </x-ux::field.content>
                <x-ux::input id="responsive-name" placeholder="Evil Rabbit" required />
            </x-ux::field>
            <x-ux::field orientation="responsive">
                <x-ux::button type="submit">Submit</x-ux::button>
                <x-ux::button type="button" variant="outline">Cancel</x-ux::button>
            </x-ux::field>
        </x-ux::field.group>
    </x-ux::field.set>
</div>
```

## Validation and Errors

Set `data-invalid="true"` on `x-ux::field` and `aria-invalid="true"` on its control. Place `x-ux::field.error`
immediately after the control or inside `x-ux::field.content`.

```blade
<x-ux::field data-invalid="true">
    <x-ux::field.label for="email">Email</x-ux::field.label>
    <x-ux::input id="email" type="email" aria-invalid="true" />
    <x-ux::field.error>Enter a valid email address.</x-ux::field.error>
</x-ux::field>
```

## Accessibility

- `x-ux::field.set` and `x-ux::field.legend` provide semantic grouping for related controls.
- `x-ux::field` renders `role="group"`.
- Use `x-ux::field.separator` only when it clarifies the relationship between groups.

## API Reference

### x-ux::field.legend

| Prop      | Type                          | Default    |
|-----------|-------------------------------|------------|
| `variant` | `enum` [?"legend" \| "label"] | `"legend"` |

### x-ux::field

| Prop          | Type                                                 | Default      |
|---------------|------------------------------------------------------|--------------|
| `orientation` | `enum` [?"vertical" \| "horizontal" \| "responsive"] | `"vertical"` |

### x-ux::field.label

| Prop       | Type                                                                                                              | Default |
|------------|-------------------------------------------------------------------------------------------------------------------|---------|
| `as-child` | `boolean` [?Change the default rendered element for the one passed as a child, merging their props and behavior.] | `false` |

### x-ux::field.error

| Prop     | Type    | Default |
|----------|---------|---------|
| `errors` | `array` | `[]`    |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-field --force
```
