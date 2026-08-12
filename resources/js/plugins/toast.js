let toastId = 0;

const toastTypes = new Set(['success', 'info', 'warning', 'error', 'loading']);

const normalizeToast = (payload, defaultDuration) => {
    if (! payload || typeof payload !== 'object') return null;

    const title = payload.title ?? null;

    const description = payload.description ?? null;

    if (! title && ! description) return null;

    return {
        title,
        description,
        type: toastTypes.has(payload.type) ? payload.type : 'default',
        action: payload.action && typeof payload.action === 'object' && payload.action.label
            ? {
                label: payload.action.label,
                onClick: payload.action.onClick ?? null,
            }
            : null,
        duration: Number.isFinite(Number(payload.duration))
            ? Math.max(0, Number(payload.duration))
            : defaultDuration,
    };
};

export default (Alpine) => {
    Alpine.directive('toast', (el, { expression }, { evaluate }) => {
        const config = evaluate(expression);
        const initialToasts = Array.isArray(config?.messages) ? config.messages : [];
        const defaultDuration = Number.isFinite(Number(config?.duration))
            ? Math.max(0, Number(config.duration))
            : 4000;

        Alpine.bind(el, {
            'x-data'() {
                return {
                    __toasts: [],
                    __toastExpanded: false,
                    __toastHovered: false,
                    __toastFocused: false,
                    __toastTimers: {},
                    __toastRemovalTimers: {},
                    __toastHoverTimer: null,
                    __toastAdd(payload) {
                        const toast = normalizeToast(payload, defaultDuration);

                        if (! toast) return;

                        toast.id = ++toastId;
                        toast.height = 0;
                        toast.remaining = toast.duration;
                        toast.starting = true;
                        toast.ending = false;
                        this.__toasts.unshift(toast);

                        this.$nextTick(() => {
                            const addedToast = this.__toasts.find(item => item.id === toast.id);

                            if (! addedToast) return;

                            requestAnimationFrame(() => {
                                addedToast.starting = false;

                                if (! this.__toastExpanded) {
                                    this.__toastSchedule(addedToast);
                                }
                            });
                        });
                    },
                    __toastMount(toast, toastElement) {
                        this.$nextTick(() => {
                            const content = toastElement.querySelector('[data-slot="toast-content"]');

                            if (! content) return;

                            content.style.height = 'auto';
                            toast.height = content.scrollHeight;
                            content.style.removeProperty('height');
                        });
                    },
                    __toastIndex(toast) {
                        if (toast.ending) return toast.exitIndex;

                        return this.__toasts
                            .filter(item => ! item.ending)
                            .indexOf(toast);
                    },
                    __toastStyle(toast) {
                        if (toast.ending) return toast.exitStyle;

                        const activeToasts = this.__toasts.filter(item => ! item.ending);
                        const activeIndex = activeToasts.indexOf(toast);
                        const frontmostHeight = activeToasts[0]?.height || toast.height;
                        const offset = activeToasts
                            .slice(0, activeIndex)
                            .reduce((total, item) => total + item.height, 0);

                        return [
                            `--toast-index:${activeIndex}`,
                            `--toast-height:${toast.height}px`,
                            `--toast-frontmost-height:${frontmostHeight}px`,
                            `--toast-offset-y:${offset}px`,
                        ].join(';');
                    },
                    __toastPointerEnter() {
                        clearTimeout(this.__toastHoverTimer);
                        this.__toastHoverTimer = null;
                        this.__toastHovered = true;
                        this.__toastSyncExpanded();
                    },
                    __toastPointerLeave() {
                        clearTimeout(this.__toastHoverTimer);
                        this.__toastHoverTimer = setTimeout(() => {
                            this.__toastHovered = false;
                            this.__toastSyncExpanded();
                        });
                    },
                    __toastSetFocused(focused) {
                        this.__toastFocused = focused;
                        this.__toastSyncExpanded();
                    },
                    __toastSyncExpanded() {
                        const expanded = this.__toastHovered || this.__toastFocused;

                        if (expanded === this.__toastExpanded) return;

                        this.__toastExpanded = expanded;

                        if (expanded) {
                            this.__toasts.forEach(toast => this.__toastPause(toast.id));
                            return;
                        }

                        this.__toasts.forEach(toast => this.__toastResume(toast));
                    },
                    __toastAction(toast) {
                        if (typeof toast.action?.onClick === 'function') {
                            toast.action.onClick(toast);
                        }

                        this.__toastDismiss(toast.id);
                    },
                    __toastSchedule(toast) {
                        if (toast.ending || toast.remaining === 0 || this.__toastExpanded) return;

                        toast.startedAt = Date.now();
                        this.__toastTimers[toast.id] = setTimeout(() => {
                            delete this.__toastTimers[toast.id];

                            if (this.__toastExpanded) return;

                            this.__toastDismiss(toast.id);
                        }, toast.remaining);
                    },
                    __toastPause(id) {
                        const toast = this.__toasts.find(item => item.id === id);

                        if (! toast) return;

                        if (toast.startedAt && this.__toastTimers[id]) {
                            toast.remaining = Math.max(
                                0,
                                toast.remaining - (Date.now() - toast.startedAt),
                            );
                        }

                        clearTimeout(this.__toastTimers[id]);
                        delete this.__toastTimers[id];
                        toast.startedAt = null;
                    },
                    __toastResume(toast) {
                        if (! toast.ending && ! this.__toastTimers[toast.id]) {
                            this.__toastSchedule(toast);
                        }
                    },
                    __toastDismiss(id) {
                        const toast = this.__toasts.find(item => item.id === id);

                        if (! toast || toast.ending) return;

                        this.__toastPause(id);
                        toast.exitIndex = this.__toastIndex(toast);
                        toast.exitStyle = this.__toastStyle(toast);
                        toast.ending = true;

                        this.__toastRemovalTimers[id] = setTimeout(() => {
                            this.__toasts = this.__toasts.filter(item => item.id !== id);
                            delete this.__toastRemovalTimers[id];
                        }, 500);
                    },
                    destroy() {
                        clearTimeout(this.__toastHoverTimer);
                        Object.values(this.__toastTimers).forEach(clearTimeout);
                        Object.values(this.__toastRemovalTimers).forEach(clearTimeout);
                    },
                };
            },
            'x-init'() {
                initialToasts.forEach(toast => this.__toastAdd(toast));
            },
            'x-on:pointerover'(event) {
                if (event.target.closest('[data-slot="toast"]')) {
                    this.__toastPointerEnter();
                }
            },
            'x-on:pointerout'(event) {
                if (! event.relatedTarget?.closest?.('[data-slot="toast"]')) {
                    this.__toastPointerLeave();
                }
            },
            'x-on:focusin'() {
                this.__toastSetFocused(true);
            },
            'x-on:focusout'(event) {
                if (! el.contains(event.relatedTarget)) {
                    this.__toastSetFocused(false);
                }
            },
            'x-on:toast.window'(event) {
                this.__toastAdd(event.detail);
            },
        });
    });

    Alpine.directive('toast-action', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__toastAction(evaluate(expression));
            },
        });
    });

    Alpine.directive('toast-item', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-init'() {
                this.__toastMount(evaluate(expression), el);
            },
        });
    });

    Alpine.directive('toast-close', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__toastDismiss(evaluate(expression));
            },
        });
    });
};
