@aware(['widthMobile' => '18rem'])
@props([
    'side' => 'left',
    'variant' => 'sidebar',
    'collapsible' => 'offcanvas',
])
@if($collapsible === 'none')
    <div
        data-slot="sidebar"
        {{ $attributes->tailwindMerge('bg-sidebar text-sidebar-foreground flex h-full w-(--sidebar-width) flex-col') }}
    >
        {{ $slot }}
    </div>
@else
    <template x-if="__sidebarProviderIsMobile">
        <x-ux::sheet x-model="__sidebarProviderOpen">
            <x-ux::sheet.content
                side="{{ $side }}"
                data-sidebar="sidebar"
                data-slot="sidebar"
                data-mobile="true"
                class="bg-sidebar text-sidebar-foreground w-(--sidebar-width) p-0 [&>button]:hidden"
                style="--sidebar-width: {{ $widthMobile }};"
            >
                <div class="flex h-full w-full flex-col">
                    {{ $slot }}
                </div>
            </x-ux::sheet.content>
        </x-ux::sheet>
    </template>
    <div
        data-slot="sidebar"
        data-side="{{ $side }}"
        data-variant="{{ $variant }}"
        x-bind:data-state="__sidebarProviderOpen ? 'expanded' : 'collapsed'"
        x-bind:data-collapsible="__sidebarProviderOpen ? false : '{{ $collapsible}}'"
        class="group peer text-sidebar-foreground hidden md:block"
    >
        <div
            class="{{
                TailwindMerge::merge([
                    'relative w-(--sidebar-width) bg-transparent transition-[width] duration-200 ease-linear',
                    'group-data-[collapsible=offcanvas]:w-0',
                    'group-data-[side=right]:rotate-180',
                    match ($variant) {
                        'floating', 'inset' => 'group-data-[collapsible=icon]:w-[calc(var(--sidebar-width-icon)+(--spacing(4)))]',
                        default => 'group-data-[collapsible=icon]:w-(--sidebar-width-icon)',
                    },
                ])
            }}"
            data-slot="sidebar-gap"
        ></div>
        <div
            {{
                $attributes->tailwindMerge([
                    'fixed inset-y-0 z-10 hidden h-svh w-(--sidebar-width) transition-[left,right,width] duration-200 ease-linear md:flex',
                    match ($side) {
                        'right' => 'right-0 group-data-[collapsible=offcanvas]:right-[calc(var(--sidebar-width)*-1)]',
                        default =>'left-0 group-data-[collapsible=offcanvas]:left-[calc(var(--sidebar-width)*-1)]',
                    },
                    match ($variant) {
                        'floating', 'inset' => 'p-2 group-data-[collapsible=icon]:w-[calc(var(--sidebar-width-icon)+(--spacing(4))+2px)]',
                        default => 'group-data-[collapsible=icon]:w-(--sidebar-width-icon) group-data-[side=left]:border-r group-data-[side=right]:border-l',
                    },
                ])
            }}
            data-slot="sidebar-container"
        >
            <div
                data-sidebar="sidebar"
                data-slot="sidebar-inner"
                class="bg-sidebar group-data-[variant=floating]:border-sidebar-border flex h-full w-full flex-col group-data-[variant=floating]:rounded-lg group-data-[variant=floating]:border group-data-[variant=floating]:shadow-sm"
            >
                {{ $slot }}
            </div>
        </div>
    </div>
@endif
