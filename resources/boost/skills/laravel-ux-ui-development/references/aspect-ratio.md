# Aspect Ratio

Use Aspect Ratio to keep media or embedded content at a stable width-to-height ratio while its container resizes.

## Composition

```text
x-ux::aspect-ratio
└── image, video, iframe, or custom content
```

## API

### `x-ux::aspect-ratio`

| Prop      | Type     | Default | Purpose                              |
|-----------|----------|---------|--------------------------------------|
| `ratio*`  | `number` | -       | Set the width divided by the height. |

The root accepts standard HTML attributes and Tailwind classes.

## Landscape Media

Pass ratios as PHP numeric expressions. Make the child fill the generated box.

```blade
<x-ux::aspect-ratio :ratio="16 / 9" class="overflow-hidden rounded-lg bg-muted">
    <img
        src="/images/landscape.jpg"
        alt="Mountain landscape at sunset"
        class="h-full w-full object-cover"
    />
</x-ux::aspect-ratio>
```

Use `21 / 9` for an ultrawide frame when the design calls for it.

## Square and Portrait Media

Square:

```blade
<x-ux::aspect-ratio :ratio="1 / 1" class="overflow-hidden rounded-lg">
    <img src="/images/avatar.jpg" alt="Team member" class="h-full w-full object-cover" />
</x-ux::aspect-ratio>
```

Portrait:

```blade
<x-ux::aspect-ratio :ratio="9 / 16" class="mx-auto max-w-sm overflow-hidden rounded-lg">
    <img src="/images/story.jpg" alt="Product demonstration" class="h-full w-full object-cover" />
</x-ux::aspect-ratio>
```

Constrain portrait content with a width utility such as `max-w-sm`; otherwise it can become unnecessarily tall on wide layouts.

## Video and Embedded Content

```blade
<x-ux::aspect-ratio :ratio="16 / 9" class="overflow-hidden rounded-lg bg-black">
    <iframe
        src="https://www.youtube-nocookie.com/embed/video-id"
        title="Product overview"
        class="h-full w-full"
        allowfullscreen
    ></iframe>
</x-ux::aspect-ratio>
```

Follow the embed provider's required `allow`, sandbox, privacy, and loading attributes.

## Dynamic Ratio

Pass a numeric PHP or Livewire value:

```blade
<x-ux::aspect-ratio :ratio="$mediaRatio" class="overflow-hidden">
    <img src="{{ $mediaUrl }}" alt="" class="h-full w-full object-cover" />
</x-ux::aspect-ratio>
```

Ensure the value is finite and greater than zero before rendering. Aspect Ratio has no client state and needs no Alpine plugin or `wire:model`.

## Sizing and Fitting

- The parent or root width determines the final size; height is derived from `ratio`.
- Use `h-full w-full` on media that must fill the box.
- Use `object-cover` to crop while filling or `object-contain` to show the complete media.
- Put `overflow-hidden` and border radius on the root when cropped media must respect rounded corners.
- Apply a width or max-width utility to the root or an ancestor. Do not hardcode height alongside a ratio unless intentionally overriding it.

## Accessibility and RTL

- Write meaningful `alt` text for informative images and `alt=""` for decorative images.
- Give iframes a descriptive `title`.
- Aspect Ratio changes layout only; it does not supply media semantics.
- The ratio itself is direction-neutral. Put `dir="rtl"` on surrounding captions or content when needed.

## Avoid

- Do not use JSX syntax such as `ratio={16 / 9}`; use Blade `:ratio="16 / 9"`.
- Do not omit `ratio` or pass zero, a negative number, `null`, or a non-numeric string.
- Do not use the non-standard Next.js `fill` attribute on a plain HTML `<img>`.
- Do not add the old padding-bottom ratio hack or another positioning wrapper.
- Do not add JavaScript to recalculate dimensions on resize; native CSS aspect-ratio handles it.
