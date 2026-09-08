let dropdownMenuId = 0;
let dropdownMenuSubId = 0;

const itemSelector = [
    '[role="menuitem"]',
    '[role="menuitemcheckbox"]',
    '[role="menuitemradio"]',
].join(',');

const enabledItems = (container) => [...container.querySelectorAll(itemSelector)]
    .filter((item) => ! item.hasAttribute('data-disabled') && item.offsetParent !== null);

export default (Alpine) => {
    Alpine.directive('dropdown-menu', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                const id = `dropdown-menu-${++dropdownMenuId}`;

                return {
                    __dropdownMenuOpen: el.dataset.state === 'open',
                    __dropdownMenuId: id,
                    __dropdownMenuTriggerId: `${id}-trigger`,
                    __dropdownMenuContentId: `${id}-content`,
                    __dropdownMenuTrigger: null,
                    __dropdownMenuTypeahead: '',
                    __dropdownMenuTypeaheadTimer: null,

                    __dropdownMenuContent() {
                        return document.getElementById(this.__dropdownMenuContentId);
                    },

                    __dropdownMenuOwnsTarget(target) {
                        return target instanceof Element
                            && target.closest('[data-dropdown-menu-owner]')?.getAttribute('data-dropdown-menu-owner') === this.__dropdownMenuId;
                    },

                    __dropdownMenuSetOpen(open, focus = null, restoreFocus = true) {
                        if (this.__dropdownMenuOpen === open) return;

                        this.__dropdownMenuOpen = open;

                        this.$nextTick(() => {
                            if (! open) {
                                if (restoreFocus) {
                                    this.__dropdownMenuTrigger?.focus({ preventScroll: true });
                                }

                                return;
                            }

                            this.__dropdownMenuSyncDimensions();

                            const items = enabledItems(this.__dropdownMenuContent());
                            const target = focus === 'last' ? items.at(-1) : items[0];

                            target?.focus({ preventScroll: true });
                        });
                    },

                    __dropdownMenuSyncDimensions() {
                        const trigger = this.__dropdownMenuTrigger;
                        const content = this.__dropdownMenuContent();

                        if (! trigger || ! content) return;

                        content.style.setProperty('--dropdown-menu-trigger-width', `${trigger.getBoundingClientRect().width}px`);
                        content.style.setProperty('--dropdown-menu-available-height', `${Math.max(0, window.innerHeight - 16)}px`);
                    },

                    __dropdownMenuMoveFocus(direction, content = this.__dropdownMenuContent()) {
                        const items = enabledItems(content);

                        if (items.length === 0) return;

                        const current = items.indexOf(document.activeElement);
                        const index = current === -1
                            ? (direction > 0 ? 0 : items.length - 1)
                            : (current + direction + items.length) % items.length;

                        items[index].focus({ preventScroll: true });
                    },

                    __dropdownMenuFocusEdge(edge, content = this.__dropdownMenuContent()) {
                        const items = enabledItems(content);
                        (edge === 'start' ? items[0] : items.at(-1))?.focus({ preventScroll: true });
                    },

                    __dropdownMenuSearch(key, content = this.__dropdownMenuContent()) {
                        window.clearTimeout(this.__dropdownMenuTypeaheadTimer);
                        this.__dropdownMenuTypeahead += key.toLocaleLowerCase();

                        const items = enabledItems(content);
                        const current = Math.max(0, items.indexOf(document.activeElement));
                        const ordered = [...items.slice(current + 1), ...items.slice(0, current + 1)];
                        const match = ordered.find((item) => item.textContent.trim().toLocaleLowerCase().startsWith(this.__dropdownMenuTypeahead));

                        match?.focus({ preventScroll: true });
                        this.__dropdownMenuTypeaheadTimer = window.setTimeout(() => {
                            this.__dropdownMenuTypeahead = '';
                        }, 500);
                    },

                    __dropdownMenuHandleKeydown(event, content = this.__dropdownMenuContent()) {
                        if (event.key === 'ArrowDown') {
                            event.preventDefault();
                            this.__dropdownMenuMoveFocus(1, content);
                        } else if (event.key === 'ArrowUp') {
                            event.preventDefault();
                            this.__dropdownMenuMoveFocus(-1, content);
                        } else if (event.key === 'Home') {
                            event.preventDefault();
                            this.__dropdownMenuFocusEdge('start', content);
                        } else if (event.key === 'End') {
                            event.preventDefault();
                            this.__dropdownMenuFocusEdge('end', content);
                        } else if (event.key === 'Escape' || event.key === 'Tab') {
                            if (event.key === 'Escape') event.preventDefault();
                            this.__dropdownMenuSetOpen(false, null, event.key !== 'Tab');
                        } else if ((event.key === 'Enter' || event.key === ' ') && document.activeElement !== this.__dropdownMenuContent()) {
                            event.preventDefault();
                            document.activeElement?.click();
                        } else if (event.key.length === 1 && ! event.ctrlKey && ! event.metaKey && ! event.altKey) {
                            this.__dropdownMenuSearch(event.key, content);
                        }
                    },
                    destroy() {
                        window.clearTimeout(this.__dropdownMenuTypeaheadTimer);
                    },
                };
            },
            'x-modelable': '__dropdownMenuOpen',
            'x-bind:data-state'() {
                return this.__dropdownMenuOpen ? 'open' : 'closed';
            },
            'x-bind:data-open'() {
                return this.__dropdownMenuOpen || null;
            },
            'x-bind:data-closed'() {
                return ! this.__dropdownMenuOpen || null;
            },
        });
    });

    Alpine.directive('dropdown-menu-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-init'() {
                this.__dropdownMenuTrigger = el;
                this.__dropdownMenuTriggerId = el.id || this.__dropdownMenuTriggerId;
                el.id = this.__dropdownMenuTriggerId;
            },
            'x-on:click'() {
                this.__dropdownMenuSetOpen(! this.__dropdownMenuOpen);
            },
            'x-on:keydown'($event) {
                if (['Enter', ' ', 'ArrowDown'].includes($event.key)) {
                    $event.preventDefault();
                    this.__dropdownMenuSetOpen(true, 'first');
                } else if ($event.key === 'ArrowUp') {
                    $event.preventDefault();
                    this.__dropdownMenuSetOpen(true, 'last');
                }
            },
            'x-bind:aria-expanded'() {
                return this.__dropdownMenuOpen;
            },
            'x-bind:aria-controls'() {
                return this.__dropdownMenuContentId;
            },
            'x-bind:data-state'() {
                return this.__dropdownMenuOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('dropdown-menu-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-ref': 'content',
            'x-init'() {
                this.__dropdownMenuContentId = el.id || this.__dropdownMenuContentId;
                el.id = this.__dropdownMenuContentId;
                el.setAttribute('aria-labelledby', this.__dropdownMenuTriggerId);
                el.setAttribute('data-dropdown-menu-owner', this.__dropdownMenuId);
            },
            'x-show'() {
                return this.__dropdownMenuOpen;
            },
            'x-bind:data-state'() {
                return this.__dropdownMenuOpen ? 'open' : 'closed';
            },
            'x-bind:data-open'() {
                return this.__dropdownMenuOpen || null;
            },
            'x-bind:data-closed'() {
                return ! this.__dropdownMenuOpen || null;
            },
            'x-on:keydown'($event) {
                this.__dropdownMenuHandleKeydown($event);
            },
            'x-on:click.outside'($event) {
                if (this.__dropdownMenuOwnsTarget($event.target)) return;

                this.__dropdownMenuSetOpen(false, null, false);
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger',
        });
    });

    Alpine.directive('dropdown-menu-item', (el) => {
        Alpine.bind(el, {
            'x-on:pointermove'() {
                if (! el.hasAttribute('data-disabled')) el.focus({ preventScroll: true });
            },
            'x-on:click'() {
                if (! el.hasAttribute('data-disabled')) this.__dropdownMenuSetOpen(false);
            },
        });
    });

    Alpine.directive('dropdown-menu-checkbox-item', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-data'() {
                return { __dropdownMenuCheckboxChecked: Boolean(evaluate(expression)) };
            },
            'x-modelable': '__dropdownMenuCheckboxChecked',
            'x-on:pointermove'() {
                if (! el.hasAttribute('data-disabled')) el.focus({ preventScroll: true });
            },
            'x-on:click'() {
                if (! el.hasAttribute('data-disabled')) {
                    this.__dropdownMenuCheckboxChecked = ! this.__dropdownMenuCheckboxChecked;
                    this.__dropdownMenuSetOpen(false);
                }
            },
            'x-bind:aria-checked'() {
                return this.__dropdownMenuCheckboxChecked;
            },
            'x-bind:data-checked'() {
                return this.__dropdownMenuCheckboxChecked || null;
            },
        });
    });

    Alpine.directive('dropdown-menu-checkbox-item-indicator', (el) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__dropdownMenuCheckboxChecked;
            },
        });
    });

    Alpine.directive('dropdown-menu-radio-group', (el, { expression }) => {
        Alpine.bind(el, {
            'x-data'() {
                return { __dropdownMenuRadioGroupValue: expression };
            },
            'x-modelable': '__dropdownMenuRadioGroupValue',
        });
    });

    Alpine.directive('dropdown-menu-radio-group-item', (el, { expression }) => {
        Alpine.bind(el, {
            'x-on:pointermove'() {
                if (! el.hasAttribute('data-disabled')) el.focus({ preventScroll: true });
            },
            'x-on:click'() {
                if (! el.hasAttribute('data-disabled')) {
                    this.__dropdownMenuRadioGroupValue = expression;
                    this.__dropdownMenuSetOpen(false);
                }
            },
            'x-bind:aria-checked'() {
                return this.__dropdownMenuRadioGroupValue === expression;
            },
            'x-bind:data-checked'() {
                return this.__dropdownMenuRadioGroupValue === expression || null;
            },
        });
    });

    Alpine.directive('dropdown-menu-radio-group-item-indicator', (el, { expression }) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__dropdownMenuRadioGroupValue === expression;
            },
        });
    });

    Alpine.directive('dropdown-menu-sub', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __dropdownMenuSubOpen: false,
                    __dropdownMenuSubTimer: null,
                    __dropdownMenuSubTrigger: null,
                    __dropdownMenuSubContent: null,
                    __dropdownMenuSubTriggerId: `dropdown-menu-sub-${++dropdownMenuSubId}-trigger`,
                    __dropdownMenuSubContentId: `dropdown-menu-sub-${dropdownMenuSubId}-content`,
                    __dropdownMenuSubOwnsTarget(target) {
                        if (! (target instanceof Element)) return false;

                        if (this.__dropdownMenuSubTrigger?.contains(target)) return true;

                        let menu = target.closest('[data-slot="dropdown-menu-sub-content"]');

                        while (menu) {
                            if (menu === this.__dropdownMenuSubContent) return true;

                            const trigger = document.getElementById(menu.getAttribute('aria-labelledby'));
                            menu = trigger?.closest('[data-slot="dropdown-menu-sub-content"]');
                        }

                        return false;
                    },
                    __dropdownMenuOpenSub() {
                        window.clearTimeout(this.__dropdownMenuSubTimer);
                        this.__dropdownMenuSubOpen = true;
                    },
                    __dropdownMenuCloseSub(delay = 0) {
                        window.clearTimeout(this.__dropdownMenuSubTimer);
                        this.__dropdownMenuSubTimer = window.setTimeout(() => {
                            this.__dropdownMenuSubOpen = false;
                        }, delay);
                    },
                    destroy() {
                        window.clearTimeout(this.__dropdownMenuSubTimer);
                    },
                };
            },
            'x-modelable': '__dropdownMenuSubOpen',
            'x-on:pointerover.document'($event) {
                if (! this.__dropdownMenuSubOpen) return;

                if (this.__dropdownMenuSubOwnsTarget($event.target)) {
                    window.clearTimeout(this.__dropdownMenuSubTimer);
                } else {
                    this.__dropdownMenuCloseSub(100);
                }
            },
        });
    });

    Alpine.directive('dropdown-menu-sub-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-init'() {
                this.__dropdownMenuSubTrigger = el;
                this.__dropdownMenuSubTriggerId = el.id || this.__dropdownMenuSubTriggerId;
                el.id = this.__dropdownMenuSubTriggerId;
            },
            'x-on:pointermove'() {
                el.focus({ preventScroll: true });
                this.__dropdownMenuOpenSub();
            },
            'x-on:pointerleave'() {
                this.__dropdownMenuCloseSub(100);
            },
            'x-on:click'() {
                this.__dropdownMenuSubOpen = ! this.__dropdownMenuSubOpen;
            },
            'x-on:keydown'($event) {
                const openKey = getComputedStyle(el).direction === 'rtl' ? 'ArrowLeft' : 'ArrowRight';

                if ($event.key === openKey || $event.key === 'Enter' || $event.key === ' ') {
                    $event.preventDefault();
                    this.__dropdownMenuOpenSub();
                    this.$nextTick(() => enabledItems(this.__dropdownMenuSubContent)[0]?.focus({ preventScroll: true }));
                }
            },
            'x-bind:aria-expanded'() {
                return this.__dropdownMenuSubOpen;
            },
            'x-bind:aria-controls'() {
                return this.__dropdownMenuSubContentId;
            },
            'x-bind:data-state'() {
                return this.__dropdownMenuSubOpen ? 'open' : 'closed';
            },
            'x-bind:data-open'() {
                return this.__dropdownMenuSubOpen || null;
            },
            'x-bind:data-popup-open'() {
                return this.__dropdownMenuSubOpen || null;
            },
        });
    });

    Alpine.directive('dropdown-menu-sub-content', (el, { modifiers }, { effect, cleanup }) => {
        Alpine.bind(el, {
            'x-init'() {
                this.__dropdownMenuSubContent = el;
                this.__dropdownMenuSubContentId = el.id || this.__dropdownMenuSubContentId;
                el.id = this.__dropdownMenuSubContentId;
                el.setAttribute('aria-labelledby', this.__dropdownMenuSubTriggerId);
                el.setAttribute('data-dropdown-menu-owner', this.__dropdownMenuId);
            },
            'x-show'() {
                return this.__dropdownMenuOpen && this.__dropdownMenuSubOpen;
            },
            'x-on:pointerenter'() {
                this.__dropdownMenuOpenSub();
            },
            'x-on:pointerleave'() {
                this.__dropdownMenuCloseSub(100);
            },
            'x-on:keydown'($event) {
                const closeKey = getComputedStyle(el).direction === 'rtl' ? 'ArrowRight' : 'ArrowLeft';

                if ($event.key === closeKey || $event.key === 'Escape') {
                    $event.preventDefault();
                    this.__dropdownMenuSubOpen = false;
                    this.__dropdownMenuSubTrigger?.focus({ preventScroll: true });
                    return;
                }

                this.__dropdownMenuHandleKeydown($event, el);
            },
            'x-bind:data-state'() {
                return this.__dropdownMenuSubOpen ? 'open' : 'closed';
            },
            'x-bind:data-open'() {
                return this.__dropdownMenuSubOpen || null;
            },
            'x-bind:data-closed'() {
                return ! this.__dropdownMenuSubOpen || null;
            },
        });

        let releaseAnchor;
        let previousPlacement;

        effect(() => {
            const direction = el.getAttribute('dir')
                || Alpine.$data(el).__direction
                || getComputedStyle(el).direction;
            const placement = modifiers.map((modifier) => (
                modifiers.includes('logical') && direction === 'rtl'
                    ? modifier.replace(/^right(?=-|$)/, 'left')
                    : modifier
            ));
            const anchor = ['x-anchor', ...placement].join('.');

            if (anchor === previousPlacement) return;

            releaseAnchor?.();
            previousPlacement = anchor;
            releaseAnchor = Alpine.bind(el, { [anchor]: '$refs.trigger' });
            el.setAttribute('data-side', placement[0].split('-')[0]);
        });

        cleanup(() => releaseAnchor?.());
    });
};
