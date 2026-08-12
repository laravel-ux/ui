@blaze
@props([
    'message' => null,
])
@php
    $duration = 4000;
    $type = is_array($message) && in_array($message['type'] ?? null, ['success', 'info', 'warning', 'error', 'loading'], true)
        ? $message['type']
        : 'default';
    $action = is_array($message) ? ($message['action'] ?? null) : null;

    if (! is_array($action) || ! filled($action['label'] ?? null)) {
        $action = null;
    }

    $toast = is_array($message)
        ? [
            'title' => $message['title'] ?? null,
            'description' => $message['description'] ?? null,
            'type' => $type,
            'duration' => $duration,
            'action' => $action,
        ]
        : null;

    $messages = $toast && (filled($toast['title']) || filled($toast['description']))
        ? [$toast]
        : [];
@endphp
@teleport('body')
    <ol
        x-toast="@js(['messages' => $messages, 'duration' => (int) $duration])"
        data-slot="toast-viewport"
        aria-label="@lang('Notifications')"
        {{ $attributes->tailwindMerge('pointer-events-none fixed inset-x-4 bottom-4 z-50 mx-auto w-auto max-w-sm outline-none sm:right-4 sm:left-auto sm:mx-0 sm:w-full') }}
    >
        <template x-for="toast in __toasts" :key="toast.id">
            <li
                x-toast-item="toast"
                x-bind:style="__toastStyle(toast)"
                x-bind:data-expanded="__toastExpanded || null"
                x-bind:data-limited="__toastIndex(toast) >= 3 || null"
                x-bind:data-starting-style="toast.starting || null"
                x-bind:data-ending-style="toast.ending || null"
                x-bind:role="toast.type === 'error' ? 'alert' : 'status'"
                data-slot="toast"
                class="cn-toast group/toast bg-popover text-popover-foreground focus-visible:border-ring focus-visible:ring-ring/50 [&[data-ending-style]:not([data-limited])]:[transform:translateX(150%)_translateY(calc((var(--toast-index)*var(--peek)*-1)-(var(--shrink)*var(--height))))_scale(var(--scale))] pointer-events-auto absolute right-0 bottom-0 z-[calc(1000-var(--toast-index))] h-(--height) w-full origin-bottom [transform:translateY(calc((var(--toast-index)*var(--peek)*-1)-(var(--shrink)*var(--height))))_scale(var(--scale))] rounded-2xl border shadow-lg will-change-transform outline-none select-none [--gap:0.75rem] [--height:var(--toast-frontmost-height,var(--toast-height))] [--offset-y:calc(var(--toast-offset-y)*-1+calc(var(--toast-index)*var(--gap)*-1))] [--peek:0.75rem] [--scale:calc(max(0,1-(var(--toast-index)*0.1)))] [--shrink:calc(1-var(--scale))] [transition:transform_500ms_cubic-bezier(0.22,1,0.36,1),opacity_500ms,height_150ms] after:absolute after:top-full after:left-0 after:h-[calc(var(--gap)+1px)] after:w-full after:content-[''] focus-visible:ring-[3px] data-expanded:h-(--toast-height) data-expanded:[transform:translateY(var(--offset-y))] data-expanded:data-ending-style:[transform:translateX(150%)_translateY(var(--offset-y))] data-limited:opacity-0 data-starting-style:[transform:translateY(150%)]"
            >
                <div
                    x-bind:data-behind="(__toastIndex(toast) > 0 && ! __toastExpanded) || null"
                    x-bind:data-expanded="__toastExpanded || null"
                    data-slot="toast-content"
                    class="flex h-full items-center gap-3 overflow-hidden p-4 transition-opacity duration-250 ease-[cubic-bezier(0.22,1,0.36,1)] data-behind:opacity-0 data-expanded:opacity-100"
                >
                    <span
                        x-show="toast.type !== 'default'"
                        data-slot="toast-icon"
                        class="[&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0"
                    >
                        <x-ux::icon x-show="toast.type === 'success'" name="circle-check" aria-hidden="true" />
                        <x-ux::icon x-show="toast.type === 'info'" name="info" aria-hidden="true" />
                        <x-ux::icon x-show="toast.type === 'warning'" name="triangle-alert" aria-hidden="true" />
                        <x-ux::icon
                            x-show="toast.type === 'error'"
                            name="octagon-x"
                            class="text-destructive"
                            aria-hidden="true"
                        />
                        <x-ux::icon
                            x-show="toast.type === 'loading'"
                            name="loader-circle"
                            class="animate-spin"
                            aria-hidden="true"
                        />
                    </span>

                    <div class="flex min-w-0 flex-1 flex-col gap-1">
                        <div
                            x-show="toast.title"
                            x-text="toast.title"
                            data-slot="toast-title"
                            class="text-sm font-medium"
                        ></div>
                        <div
                            x-show="toast.description"
                            x-text="toast.description"
                            data-slot="toast-description"
                            class="text-muted-foreground text-sm"
                        ></div>
                    </div>

                    <x-ux::button
                        x-show="toast.action"
                        x-text="toast.action?.label"
                        x-toast-action="toast"
                        data-slot="toast-action"
                        variant="outline"
                        size="sm"
                        class="shrink-0"
                    />

                    <x-ux::button
                        x-toast-close="toast.id"
                        data-slot="toast-close"
                        aria-label="@lang('Close toast')"
                        variant="ghost"
                        size="icon-sm"
                        class="text-muted-foreground hover:text-foreground relative shrink-0 after:absolute after:-inset-2 after:content-['']"
                    >
                        <x-ux::icon name="x" aria-hidden="true" />
                    </x-ux::button>
                </div>
            </li>
        </template>
    </ol>
@endteleport
