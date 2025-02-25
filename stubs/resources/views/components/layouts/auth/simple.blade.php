@aware(['title'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('ui::partials.head')
<body>
    <div class="flex min-h-svh flex-col items-center justify-center gap-6 bg-background p-6 md:p-10">
        <div class="w-full max-w-sm">
            <a href="/" class="flex flex-col items-center gap-2 font-medium">
                <span class="flex h-9 w-9 mb-1 items-center justify-center rounded-md">
                    <x-ui::logo class="size-9 fill-current text-black dark:text-white" />
                </span>
                <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
            </a>
            {{ $slot }}
        </div>
    </div>
    @include('ui::partials.foot')
</body>
</html>
