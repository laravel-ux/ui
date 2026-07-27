# Textarea

Use `x-ux::textarea` to display a form textarea.

## Usage

```blade
<x-ux::textarea />
```

## Field

Use `x-ux::field`, `x-ux::field.label`, and `x-ux::field.description` to create a textarea with a label and description.

```blade
<x-ux::field class="w-full max-w-xs">
    <x-ux::field.label for="textarea-message">Message</x-ux::field.label>
    <x-ux::field.description>Enter your message below.</x-ux::field.description>
    <x-ux::textarea id="textarea-message" placeholder="Type your message here." />
</x-ux::field>
```

## Disabled

Use the `disabled` attribute to disable the textarea. To style the disabled state, add the `data-disabled` attribute to `x-ux::field`.

```blade
<x-ux::field data-disabled="true" class="w-full max-w-xs">
    <x-ux::field.label for="textarea-disabled">Message</x-ux::field.label>
    <x-ux::textarea
        id="textarea-disabled"
        disabled
        placeholder="Type your message here."
    />
</x-ux::field>
```

## Invalid

Use the `aria-invalid` attribute to mark the textarea as invalid. To style the invalid state, add the `data-invalid` attribute to `x-ux::field`.

```blade
<x-ux::field data-invalid="true" class="w-full max-w-xs">
    <x-ux::field.label for="textarea-invalid">Message</x-ux::field.label>
    <x-ux::textarea
        id="textarea-invalid"
        aria-invalid="true"
        placeholder="Type your message here."
    />
    <x-ux::field.description>
        Please enter a valid message.
    </x-ux::field.description>
</x-ux::field>
```

## Button

Pair with `x-ux::button` to create a textarea with a submit button.

```blade
<div class="grid w-full max-w-xs gap-2">
    <x-ux::textarea placeholder="Type your message here." />
    <x-ux::button>Send message</x-ux::button>
</div>
```

## RTL

```blade
<x-ux::field class="w-full max-w-xs" dir="rtl">
    <x-ux::field.label for="feedback">
        التعليقات
    </x-ux::field.label>
    <x-ux::textarea
        id="feedback"
        placeholder="تعليقاتك تساعدنا على التحسين..."
        rows="4"
    />
    <x-ux::field.description>
        شاركنا أفكارك حول خدمتنا.
    </x-ux::field.description>
</x-ux::field>
```
