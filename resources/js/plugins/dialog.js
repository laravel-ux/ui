let dialogId = 0;
let scrollLockCount = 0;
let bodyOverflow = '';
let bodyPaddingRight = '';
const inertElements = new WeakMap();

const focusableSelector = [
    'a[href]',
    'button:not([disabled])',
    'input:not([disabled]):not([type="hidden"])',
    'select:not([disabled])',
    'textarea:not([disabled])',
    '[tabindex]:not([tabindex="-1"])',
].join(',');

const lockScroll = () => {
    if (scrollLockCount === 0) {
        bodyOverflow = document.body.style.overflow;
        bodyPaddingRight = document.body.style.paddingRight;

        const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;

        if (scrollbarWidth > 0) {
            document.body.style.paddingRight = `${scrollbarWidth}px`;
        }

        document.body.style.overflow = 'hidden';
    }

    scrollLockCount += 1;
};

const unlockScroll = () => {
    scrollLockCount = Math.max(0, scrollLockCount - 1);

    if (scrollLockCount === 0) {
        document.body.style.overflow = bodyOverflow;
        document.body.style.paddingRight = bodyPaddingRight;
    }
};

const makeInert = (element) => {
    const state = inertElements.get(element) || {
        count: 0,
        inert: element.inert,
    };

    state.count += 1;
    inertElements.set(element, state);
    element.inert = true;
};

const restoreInert = (element) => {
    const state = inertElements.get(element);

    if (! state) return;

    state.count -= 1;

    if (state.count === 0) {
        element.inert = state.inert;
        inertElements.delete(element);
    }
};

export default (Alpine) => {
    Alpine.directive('dialog', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                const id = `dialog-${++dialogId}`;

                return {
                    __dialogId: id,
                    __contentId: `${id}-content`,
                    __titleId: `${id}-title`,
                    __descriptionId: `${id}-description`,
                    __isOpen: el.dataset.state === 'open',
                    __isScrollLocked: false,
                    __trigger: null,
                    __previouslyFocused: null,
                    __inertElements: [],

                    __content() {
                        return document.getElementById(this.__contentId);
                    },

                    __setOpen(open) {
                        if (this.__isOpen === open) return;

                        this.__isOpen = open;
                    },

                    __makeBackgroundInert() {
                        const owner = this.__dialogId;

                        this.__inertElements = [...document.body.children].filter((element) => (
                            element.dataset.dialogOwner !== owner
                            && element.tagName !== 'SCRIPT'
                            && element.tagName !== 'STYLE'
                        ));

                        this.__inertElements.forEach(makeInert);
                    },

                    __restoreBackground() {
                        this.__inertElements.forEach(restoreInert);
                        this.__inertElements = [];
                    },

                    __syncDialog() {
                        if (this.__isOpen) {
                            this.__previouslyFocused = document.activeElement;

                            if (! this.__isScrollLocked) {
                                lockScroll();
                                this.__isScrollLocked = true;
                            }

                            this.$nextTick(() => {
                                this.__makeBackgroundInert();

                                const content = this.__content();
                                const autofocus = content?.querySelector('[autofocus]');
                                const firstFocusable = content?.querySelector(focusableSelector);

                                (autofocus || firstFocusable || content)?.focus({ preventScroll: true });
                            });

                            return;
                        }

                        if (this.__isScrollLocked) {
                            unlockScroll();
                            this.__isScrollLocked = false;
                        }

                        this.__restoreBackground();

                        const focusTarget = this.__trigger || this.__previouslyFocused;

                        this.$nextTick(() => {
                            if (focusTarget instanceof HTMLElement && focusTarget.isConnected) {
                                focusTarget.focus({ preventScroll: true });
                            }
                        });
                    },

                    __trapFocus(event) {
                        if (event.key !== 'Tab') return;

                        const content = this.__content();
                        const focusable = [...(content?.querySelectorAll(focusableSelector) || [])]
                            .filter((item) => item.offsetParent !== null);

                        if (focusable.length === 0) {
                            event.preventDefault();
                            content?.focus();
                            return;
                        }

                        const first = focusable[0];
                        const last = focusable[focusable.length - 1];

                        if (event.shiftKey && document.activeElement === first) {
                            event.preventDefault();
                            last.focus();
                        } else if (! event.shiftKey && document.activeElement === last) {
                            event.preventDefault();
                            first.focus();
                        }
                    },
                };
            },
            'x-init'() {
                this.__syncDialog();
                this.$watch('__isOpen', () => this.__syncDialog());
            },
            'x-modelable': '__isOpen',
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
            'x-bind:data-open'() {
                return this.__isOpen || null;
            },
            'x-bind:data-closed'() {
                return ! this.__isOpen || null;
            },
            'x-bind:data-dialog-owner'() {
                return this.__dialogId;
            },
        });
    });

    Alpine.directive('dialog-overlay', (el) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__isOpen;
            },
            'x-on:click.self'() {
                this.__setOpen(false);
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
            'x-bind:data-open'() {
                return this.__isOpen || null;
            },
            'x-bind:data-closed'() {
                return ! this.__isOpen || null;
            },
            'x-bind:data-dialog-owner'() {
                return this.__dialogId;
            },
        });
    });

    Alpine.directive('dialog-trigger', (el) => {
        Alpine.bind(el, {
            'x-init'() {
                this.__trigger = el;
            },
            'x-on:click'() {
                this.__setOpen(true);
            },
            'x-bind:aria-expanded'() {
                return this.__isOpen;
            },
            'x-bind:aria-controls'() {
                return this.__contentId;
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('dialog-content', (el) => {
        Alpine.bind(el, {
            'x-init'() {
                el.id ||= this.__contentId;

                this.$nextTick(() => {
                    const title = el.querySelector('[data-slot="dialog-title"]');
                    const description = el.querySelector('[data-slot="dialog-description"]');

                    if (title) {
                        title.id ||= this.__titleId;
                        el.setAttribute('aria-labelledby', title.id);
                    }

                    if (description) {
                        description.id ||= this.__descriptionId;
                        el.setAttribute('aria-describedby', description.id);
                    }
                });
            },
            'x-show'() {
                return this.__isOpen;
            },
            'x-on:keydown'($event) {
                if ($event.key === 'Escape') {
                    $event.preventDefault();
                    this.__setOpen(false);
                    return;
                }

                this.__trapFocus($event);
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
            'x-bind:data-open'() {
                return this.__isOpen || null;
            },
            'x-bind:data-closed'() {
                return ! this.__isOpen || null;
            },
            'x-bind:data-dialog-owner'() {
                return this.__dialogId;
            },
        });
    });

    Alpine.directive('dialog-close', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__setOpen(false);
            },
        });
    });
};
