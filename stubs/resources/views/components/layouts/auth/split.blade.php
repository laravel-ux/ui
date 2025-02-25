@aware(['title'])
@php
    [$message, $author] = str(Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('ui::partials.head')
<body class="container relative hidden min-h-screen flex-col items-center justify-center md:grid lg:max-w-none lg:grid-cols-2 lg:px-0">
    <div class="relative hidden h-full flex-col bg-muted p-10 text-white dark:border-r lg:flex">
        <div class="absolute inset-0 bg-zinc-900"></div>
        <a href="/" class="relative z-20 flex items-center text-lg font-medium">
                    <span class="flex h-10 w-10 items-center justify-center rounded-md">
                        <x-ui::logo class="mr-2 h-7 fill-current text-white" />
                    </span>
            {{ config('app.name') }}
        </a>
        <div class="relative z-20 mt-auto">
            <blockquote class="space-y-2">
                <p class="text-lg">{{ trim($message) }}</p>
                <footer class="text-sm">{{ trim($author) }}</footer>
            </blockquote>
        </div>
    </div>
    <div class="lg:p-8">
        <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
            {{ $slot }}
        </div>
    </div>
    @include('ui::partials.foot')
</body>
</html>
