# Checkbox

A control that allows the user to toggle between checked and not checked.

```blade preview
<x-ux::field.group class="max-w-sm">
    <x-ux::field orientation="horizontal">
        <x-ux::checkbox id="terms-checkbox" name="terms-checkbox" />
        <x-ux::label for="terms-checkbox">Accept terms and conditions</x-ux::label>
    </x-ux::field>
    <x-ux::field orientation="horizontal">
        <x-ux::checkbox id="terms-checkbox-2" name="terms-checkbox-2" checked />
        <x-ux::field.content>
            <x-ux::field.label for="terms-checkbox-2">
                Accept terms and conditions
            </x-ux::field.label>
            <x-ux::field.description>
                By clicking this checkbox, you agree to the terms.
            </x-ux::field.description>
        </x-ux::field.content>
    </x-ux::field>
    <x-ux::field orientation="horizontal" data-disabled>
        <x-ux::checkbox id="toggle-checkbox" name="toggle-checkbox" disabled />
        <x-ux::field.label for="toggle-checkbox">Enable notifications</x-ux::field.label>
    </x-ux::field>
    <x-ux::field.label>
        <x-ux::field orientation="horizontal">
            <x-ux::checkbox id="toggle-checkbox-2" name="toggle-checkbox-2" />
            <x-ux::field.content>
                <x-ux::field.title>Enable notifications</x-ux::field.title>
                <x-ux::field.description>
                    You can enable or disable notifications at any time.
                </x-ux::field.description>
            </x-ux::field.content>
        </x-ux::field>
    </x-ux::field.label>
</x-ux::field.group>
```

## Usage

```blade
<x-ux::checkbox />
```

## Invalid State

Set `aria-invalid` on the checkbox and `data-invalid` on the field wrapper to show the invalid styles.

```blade preview
<x-ux::field.group class="mx-auto w-56">
    <x-ux::field orientation="horizontal" data-invalid>
        <x-ux::checkbox
            id="terms-checkbox-invalid"
            name="terms-checkbox-invalid"
            aria-invalid="true"
        />
        <x-ux::field.label for="terms-checkbox-invalid">
            Accept terms and conditions
        </x-ux::field.label>
    </x-ux::field>
</x-ux::field.group>
```

## Basic

Pair the checkbox with `<x-ux::field>` and `<x-ux::field.label>` for proper layout and labeling.

```blade preview
<x-ux::field.group class="mx-auto w-56">
    <x-ux::field orientation="horizontal">
        <x-ux::checkbox id="terms-checkbox-basic" name="terms-checkbox-basic" />
        <x-ux::field.label for="terms-checkbox-basic">
            Accept terms and conditions
        </x-ux::field.label>
    </x-ux::field>
</x-ux::field.group>
```

## Description

Use `<x-ux::field.content>` and `<x-ux::field.description>` for helper text.

```blade preview
<x-ux::field.group class="mx-auto w-72">
    <x-ux::field orientation="horizontal">
        <x-ux::checkbox
            id="terms-checkbox-desc"
            name="terms-checkbox-desc"
            checked
        />
        <x-ux::field.content>
            <x-ux::field.label for="terms-checkbox-desc">
                Accept terms and conditions
            </x-ux::field.label>
            <x-ux::field.description>
                By clicking this checkbox, you agree to the terms and conditions.
            </x-ux::field.description>
        </x-ux::field.content>
    </x-ux::field>
</x-ux::field.group>
```

## Disabled

Use the `disabled` attribute to prevent interaction and add the `data-disabled` attribute to `<x-ux::field>` for disabled styles.

```blade preview
<x-ux::field.group class="mx-auto w-56">
    <x-ux::field orientation="horizontal" data-disabled>
        <x-ux::checkbox
            id="toggle-checkbox-disabled"
            name="toggle-checkbox-disabled"
            disabled
        />
        <x-ux::field.label for="toggle-checkbox-disabled">
            Enable notifications
        </x-ux::field.label>
    </x-ux::field>
</x-ux::field.group>
```

## Group

Use multiple fields to create a checkbox list.

```blade preview
<x-ux::field.set>
    <x-ux::field.legend variant="label">
        Show these items on the desktop:
    </x-ux::field.legend>
    <x-ux::field.description>
        Select the items you want to show on the desktop.
    </x-ux::field.description>
    <x-ux::field.group class="gap-3">
        <x-ux::field orientation="horizontal">
            <x-ux::checkbox id="finder-hard-disks" name="finder-hard-disks" checked />
            <x-ux::field.label for="finder-hard-disks" class="font-normal">Hard disks</x-ux::field.label>
        </x-ux::field>
        <x-ux::field orientation="horizontal">
            <x-ux::checkbox id="finder-external-disks" name="finder-external-disks" checked />
            <x-ux::field.label for="finder-external-disks" class="font-normal">External disks</x-ux::field.label>
        </x-ux::field>
        <x-ux::field orientation="horizontal">
            <x-ux::checkbox id="finder-cds-dvds" name="finder-cds-dvds" />
            <x-ux::field.label for="finder-cds-dvds" class="font-normal">CDs, DVDs, and iPods</x-ux::field.label>
        </x-ux::field>
        <x-ux::field orientation="horizontal">
            <x-ux::checkbox id="finder-connected-servers" name="finder-connected-servers" />
            <x-ux::field.label for="finder-connected-servers" class="font-normal">Connected servers</x-ux::field.label>
        </x-ux::field>
    </x-ux::field.group>
</x-ux::field.set>
```

## Table

```blade preview
<div
    x-data="{
        selected: { 1: true, 2: false, 3: false, 4: false },
        all: false,
        toggleAll() {
            Object.keys(this.selected).forEach((id) => this.selected[id] = this.all)
        },
    }"
    class="w-full"
>
    <x-ux::table>
        <x-ux::table.header>
            <x-ux::table.row>
                <x-ux::table.head class="w-8">
                    <x-ux::checkbox
                        id="select-all-checkbox"
                        name="select-all-checkbox"
                        x-model="all"
                        x-on:click="$nextTick(() => toggleAll())"
                    />
                </x-ux::table.head>
                <x-ux::table.head>Name</x-ux::table.head>
                <x-ux::table.head>Email</x-ux::table.head>
                <x-ux::table.head>Role</x-ux::table.head>
            </x-ux::table.row>
        </x-ux::table.header>
        <x-ux::table.body>
            @foreach ([
                ['id' => 1, 'name' => 'Sarah Chen', 'email' => 'sarah.chen@example.com', 'role' => 'Admin'],
                ['id' => 2, 'name' => 'Marcus Rodriguez', 'email' => 'marcus.rodriguez@example.com', 'role' => 'User'],
                ['id' => 3, 'name' => 'Priya Patel', 'email' => 'priya.patel@example.com', 'role' => 'User'],
                ['id' => 4, 'name' => 'David Kim', 'email' => 'david.kim@example.com', 'role' => 'Editor'],
            ] as $row)
                <x-ux::table.row x-bind:data-state="selected[{{ $row['id'] }}] ? 'selected' : null">
                    <x-ux::table.cell>
                        <x-ux::checkbox
                            id="row-{{ $row['id'] }}-checkbox"
                            name="rows[]"
                            value="{{ $row['id'] }}"
                            x-model="selected[{{ $row['id'] }}]"
                            x-on:click="$nextTick(() => all = Object.values(selected).every(Boolean))"
                        />
                    </x-ux::table.cell>
                    <x-ux::table.cell class="font-medium">{{ $row['name'] }}</x-ux::table.cell>
                    <x-ux::table.cell>{{ $row['email'] }}</x-ux::table.cell>
                    <x-ux::table.cell>{{ $row['role'] }}</x-ux::table.cell>
                </x-ux::table.row>
            @endforeach
        </x-ux::table.body>
    </x-ux::table>
</div>
```

## RTL

To enable RTL support, set the `dir="rtl"` attribute on the checkbox group or a parent element.

```blade preview
<x-ux::field.group class="max-w-sm" dir="rtl">
    <x-ux::field orientation="horizontal">
        <x-ux::checkbox id="terms-checkbox-rtl" name="terms-checkbox" />
        <x-ux::label for="terms-checkbox-rtl">قبول الشروط والأحكام</x-ux::label>
    </x-ux::field>
    <x-ux::field orientation="horizontal">
        <x-ux::checkbox id="terms-checkbox-2-rtl" name="terms-checkbox-2" checked />
        <x-ux::field.content>
            <x-ux::field.label for="terms-checkbox-2-rtl">قبول الشروط والأحكام</x-ux::field.label>
            <x-ux::field.description>
                بالنقر على هذا المربع، فإنك توافق على الشروط.
            </x-ux::field.description>
        </x-ux::field.content>
    </x-ux::field>
    <x-ux::field orientation="horizontal" data-disabled>
        <x-ux::checkbox id="toggle-checkbox-rtl" name="toggle-checkbox" disabled />
        <x-ux::field.label for="toggle-checkbox-rtl">تفعيل الإشعارات</x-ux::field.label>
    </x-ux::field>
    <x-ux::field.label>
        <x-ux::field orientation="horizontal">
            <x-ux::checkbox id="toggle-checkbox-2-rtl" name="toggle-checkbox-2" />
            <x-ux::field.content>
                <x-ux::field.title>تفعيل الإشعارات</x-ux::field.title>
                <x-ux::field.description>
                    يمكنك تفعيل أو إلغاء تفعيل الإشعارات في أي وقت.
                </x-ux::field.description>
            </x-ux::field.content>
        </x-ux::field>
    </x-ux::field.label>
</x-ux::field.group>
```

## API Reference

| Prop      | Type      | Default |
|-----------|-----------|---------|
| `checked` | `boolean` | `false` |

## Publishing

This component works out of the box, but you can publish its Blade views if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-checkbox --force
```
