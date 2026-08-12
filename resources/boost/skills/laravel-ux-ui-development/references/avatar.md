# Avatar

Use Avatar to represent a person, team, organization, or account with an image and a reliable text fallback.

## Composition

```text
x-ux::avatar
├── x-ux::avatar.image
├── x-ux::avatar.fallback
└── x-ux::avatar.badge
```

For overlapping collections:

```text
x-ux::avatar.group
├── x-ux::avatar
└── x-ux::avatar.group-count
```

Image and Fallback belong inside the same Avatar. Badge is optional. Repeat Avatar inside Group and put Group Count
last.

## API

### `x-ux::avatar`

| Prop   | Type              | Default   | Purpose                  |
|--------|-------------------|-----------|--------------------------|
| `size` | `default\|sm\|lg` | `default` | Set the avatar diameter. |

### `x-ux::avatar.image`

| Prop   | Type     | Default | Purpose                        |
|--------|----------|---------|--------------------------------|
| `src*` | `string` | -       | Set the image URL.             |
| `alt`  | `string` | `""`    | Provide the image alternative. |

Fallback, Badge, Group, and Group Count accept standard HTML attributes and Tailwind classes. They have no additional
component props.

## Basic Avatar

```blade
<x-ux::avatar>
    <x-ux::avatar.image src="{{ $user->avatar_url }}" alt="{{ $user->name }}" />
    <x-ux::avatar.fallback>{{ $user->initials() }}</x-ux::avatar.fallback>
</x-ux::avatar>
```

Always provide Fallback. It is displayed while the image loads and when loading fails.

## Sizes

```blade
<div class="flex items-center gap-2">
    <x-ux::avatar size="sm">
        <x-ux::avatar.image src="{{ $user->avatar_url }}" alt="{{ $user->name }}" />
        <x-ux::avatar.fallback>{{ $user->initials() }}</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar>
        <x-ux::avatar.image src="{{ $user->avatar_url }}" alt="{{ $user->name }}" />
        <x-ux::avatar.fallback>{{ $user->initials() }}</x-ux::avatar.fallback>
    </x-ux::avatar>
    <x-ux::avatar size="lg">
        <x-ux::avatar.image src="{{ $user->avatar_url }}" alt="{{ $user->name }}" />
        <x-ux::avatar.fallback>{{ $user->initials() }}</x-ux::avatar.fallback>
    </x-ux::avatar>
</div>
```

Prefer the `size` prop over duplicating width and height classes. Use custom size classes only when the design requires
a size outside the public scale.

## Badge

Use Badge for a compact presence or status indicator:

```blade
<x-ux::avatar>
    <x-ux::avatar.image src="{{ $user->avatar_url }}" alt="{{ $user->name }}" />
    <x-ux::avatar.fallback>{{ $user->initials() }}</x-ux::avatar.fallback>
    <x-ux::avatar.badge class="bg-green-600 dark:bg-green-800" />
</x-ux::avatar>
```

Badge may contain an icon at default and large sizes:

```blade
<x-ux::avatar size="lg">
    <x-ux::avatar.image src="{{ $user->avatar_url }}" alt="{{ $user->name }}" />
    <x-ux::avatar.fallback>{{ $user->initials() }}</x-ux::avatar.fallback>
    <x-ux::avatar.badge>
        <x-ux::icon name="check" />
    </x-ux::avatar.badge>
</x-ux::avatar>
```

Icons inside a small Badge are hidden intentionally. Do not use Badge as the only visible explanation of a complex
status.

## Avatar Group

```blade
<x-ux::avatar.group>
    @foreach ($members->take(3) as $member)
        <x-ux::avatar wire:key="member-avatar-{{ $member->id }}">
            <x-ux::avatar.image src="{{ $member->avatar_url }}" alt="{{ $member->name }}" />
            <x-ux::avatar.fallback>{{ $member->initials() }}</x-ux::avatar.fallback>
        </x-ux::avatar>
    @endforeach

    @if ($members->count() > 3)
        <x-ux::avatar.group-count>
            +{{ $members->count() - 3 }}
        </x-ux::avatar.group-count>
    @endif
</x-ux::avatar.group>
```

Use the same size for every Avatar in a Group. Group Count automatically follows `sm`, `default`, or `lg` avatars in the
group.

Group Count may contain an icon instead of a number:

```blade
<x-ux::avatar.group-count aria-label="Add member">
    <x-ux::icon name="plus" />
</x-ux::avatar.group-count>
```

Use a button or link around an interactive count; Group Count itself renders a non-interactive `<div>`.

## Dropdown Trigger

Wrap Avatar in a labelled button and use it as a composed dropdown trigger:

```blade
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger as-child>
        <button type="button" class="rounded-full" aria-label="Open account menu">
            <x-ux::avatar>
                <x-ux::avatar.image src="{{ $user->avatar_url }}" alt="" />
                <x-ux::avatar.fallback>{{ $user->initials() }}</x-ux::avatar.fallback>
            </x-ux::avatar>
        </button>
    </x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content>
        <x-ux::dropdown-menu.item>Profile</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.item>Log out</x-ux::dropdown-menu.item>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

Use `alt=""` here because the button's accessible label already names the control and the image is decorative in that
context.

## Livewire Images

Avatar watches `src` changes and returns to the loading state when Livewire replaces an image URL. Use stable keys for
repeated users:

```blade
<x-ux::avatar wire:key="avatar-{{ $user->id }}">
    <x-ux::avatar.image src="{{ $user->avatar_url }}" alt="{{ $user->name }}" />
    <x-ux::avatar.fallback>{{ $user->initials() }}</x-ux::avatar.fallback>
</x-ux::avatar>
```

Do not add custom image error handlers just to reveal Fallback; the Avatar plugin already handles loading, success,
error, and `src` replacement.

## Accessibility and RTL

- Use meaningful `alt` text when the image conveys identity and no adjacent text provides the same name.
- Use `alt=""` when nearby text or the parent control already identifies the user.
- Keep fallback initials short, normally one or two grapheme clusters, and derive them from the display name.
- Do not rely on Badge color alone for a status that users must understand.
- Badge uses inline-end positioning and Group reverses overlap spacing under `dir="rtl"`.

## Avoid

- Do not use React names such as `AvatarImage`, `AvatarBadge`, or `AvatarGroupCount`.
- Do not omit Fallback.
- Do not put Image and Fallback outside the same Avatar.
- Do not manually toggle Image and Fallback with `x-show` or Livewire conditionals.
- Do not make Avatar itself clickable without a semantic button or link.
- Do not render every member in a large team; show a short group and summarize the remainder with Group Count.
