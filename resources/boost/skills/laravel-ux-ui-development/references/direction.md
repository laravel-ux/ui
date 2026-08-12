# Direction

Use Direction to provide `ltr` or `rtl` behavior to an application region, including component content teleported to
`body`. Prefer the native `dir` attribute on `<html>` when the entire document has one direction.

## API

### `x-ux::direction`

| Prop        | Values       | Default | Purpose                                                          |
|-------------|--------------|---------|------------------------------------------------------------------|
| `direction` | `ltr`, `rtl` | `ltr`   | Set text direction for HTML, CSS, and nested component behavior. |

Direction also supports `x-model` when client-side switching is required.

## Global Direction

Set both the document attribute and provider when one locale controls the whole page:

```blade
<html lang="{{ app()->getLocale() }}" dir="{{ $direction }}">
    <body>
        <x-ux::direction :$direction>
            {{ $slot }}
        </x-ux::direction>
    </body>
</html>
```

The `<html dir>` attribute handles native browser layout and initial rendering. Direction supplies the same value to
interactive component behavior.

## Isolated Region

```blade
<x-ux::direction direction="rtl">
    <x-ux::card>
        {{-- Arabic, Hebrew, or Persian content --}}
    </x-ux::card>
</x-ux::direction>
```

Use this pattern for embedded RTL content inside an LTR page. Nested Direction providers override the nearest parent
provider.

## Portals

Dialog, Drawer, Sheet, Dropdown Menu, Popover, and Tooltip content automatically receive the nearest Direction value after
teleporting to `body`. An explicit `dir` attribute on portal Content takes precedence when a single overlay needs a
different direction.

```blade
<x-ux::direction direction="rtl">
    <x-ux::popover>
        <x-ux::popover.trigger>فتح</x-ux::popover.trigger>
        <x-ux::popover.content>
            هذا المحتوى يبقى من اليمين إلى اليسار بعد نقله إلى body.
        </x-ux::popover.content>
    </x-ux::popover>
</x-ux::direction>
```

## Rules

- Use only `ltr` or `rtl`; invalid values normalize to `ltr` on the client.
- Prefer a server-rendered `direction` prop when locale switching performs navigation or a Livewire render.
- Keep `lang` on `<html>` or the nearest semantic content container; language and direction are separate concerns.
- Use logical Tailwind utilities such as `ms-*`, `me-*`, `start-*`, and `end-*` inside Direction regions.
- Flip directional icons with `rtl:rotate-180` when their meaning follows reading direction.
- Do not manually copy `dir` to every portal component when Direction already wraps it.
- Do not use Direction only for text alignment; use `text-start` or `text-end` when reading direction itself is
  unchanged.
