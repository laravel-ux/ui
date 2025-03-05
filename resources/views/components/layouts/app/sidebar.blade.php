@aware(['title'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('ui::partials.head')
<body class="min-h-svh bg-background font-sans antialiased">
    <div class="relative flex min-h-svh flex-col bg-background">
        <div class="themes-wrapper bg-background">
            <x-ui::sidebar.provider>
                <x-ui::sidebar>
                    <x-ui::sidebar.header>
                        <x-ui::sidebar.menu>
                            <x-ui::sidebar.menu.item>
                                <x-ui::sidebar.menu.link size="lg" href="{{ route('dashboard') }}">
                                    <div class="flex aspect-square size-8 items-center justify-center rounded-lg bg-sidebar-primary text-sidebar-primary-foreground">
                                        <x-ui::logo class="size-4" />
                                    </div>
                                    <div class="grid flex-1 text-left text-sm leading-tight">
                                        <span class="truncate font-semibold">{{ config('app.name') }}</span>
                                    </div>
                                </x-ui::sidebar.menu.link>
                            </x-ui::sidebar.menu.item>
                        </x-ui::sidebar.menu>
                    </x-ui::sidebar.header>
                    <x-ui::sidebar.content>
                        <x-ui::sidebar.group>
                            <x-ui::sidebar.menu>
                                <x-ui::sidebar.menu.item>
                                    <x-ui::sidebar.menu.link
                                        href="{{ route('dashboard') }}"
                                        active="{{ request()->routeIs('dashboard') }}"
                                    >
                                        <x-ui::icon name="layout-dashboard" />
                                        <span>Dashboard</span>
                                    </x-ui::sidebar.menu.link>
                                </x-ui::sidebar.menu.item>
                            </x-ui::sidebar.menu>
                        </x-ui::sidebar.group>
                    </x-ui::sidebar.content>
                    <x-ui::sidebar.footer>
                        <x-ui::sidebar.menu>
                            <x-ui::sidebar.menu.item>

                            </x-ui::sidebar.menu.item>
                        </x-ui::sidebar.menu>
                    </x-ui::sidebar.footer>
                </x-ui::sidebar>
                <x-ui::sidebar.inset>
                    <header class="flex h-16 shrink-0 items-center gap-2 transition-[width,height] ease-linear group-has-[[data-collapsible=icon]]/sidebar-wrapper:h-12">
                        <div class="flex items-center gap-2 px-4">
                            <x-ui::sidebar.trigger class="-ml-1" />
                            <x-ui::separator orientation="vertical" class="mr-2 h-4" />
                            <x-ui::breadcrumb>
                                <x-ui::breadcrumb.list>
                                    <x-ui::breadcrumb.item>
                                        <x-ui::breadcrumb.page>
                                            Dashboard
                                        </x-ui::breadcrumb.page>
                                    </x-ui::breadcrumb.item>
                                </x-ui::breadcrumb.list>
                            </x-ui::breadcrumb>
                        </div>
                    </header>
                    <div class="flex flex-1 flex-col gap-4 p-4 pt-0">
                        {{ $slot }}
                    </div>
                </x-ui::sidebar.inset>
            </x-ui::sidebar.provider>
        </div>
    </div>
    @include('ui::partials.foot')
</body>
</html>
