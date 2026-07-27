let selectId = 0;

const enabledItems = (content) => [...(content?.querySelectorAll('[data-slot="select-item"]') || [])]
    .filter((item) => ! item.hasAttribute('data-disabled') && item.offsetParent !== null);
const resolveAnchorModifiers = (el, modifiers, direction) => {
    const resolved = [...modifiers];
    const side = resolved[0];

    if (side === 'inline-start' || side === 'inline-end') {
        const isStart = side === 'inline-start';
        const isRtl = (el.getAttribute('dir') || direction || document.documentElement.dir) === 'rtl';

        resolved[0] = isStart === isRtl ? 'right' : 'left';
    }

    return resolved;
};

export default (Alpine) => {
    Alpine.directive('select', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                const id = `select-${++selectId}`;

                return {
                    __selectOpen: false,
                    __selectValue: el.dataset.value || null,
                    __selectLabel: null,
                    __selectId: id,
                    __selectTriggerId: `${id}-trigger`,
                    __selectContentId: `${id}-content`,
                    __selectTrigger: null,
                    __selectTypeahead: '',
                    __selectTypeaheadTimer: null,
                    __selectContent() {
                        return document.getElementById(this.__selectContentId);
                    },
                    __selectItems() {
                        return enabledItems(this.__selectContent());
                    },
                    __selectUpdateLabel() {
                        const item = [...(this.__selectContent()?.querySelectorAll('[data-slot="select-item"]') || [])]
                            .find((candidate) => candidate.dataset.value === this.__selectValue);
                        this.__selectLabel = item?.querySelector('[data-select-item-text]')?.textContent.trim() || null;
                    },
                    __selectSyncInput() {
                        const input = el.querySelector('[data-select-input]');
                        if (! input) return;

                        input.value = this.__selectValue ?? '';
                        input.disabled = el.dataset.disabled !== undefined || this.__selectValue === null;
                    },
                    __selectSyncDimensions() {
                        const content = this.__selectContent();
                        if (! this.__selectTrigger || ! content) return;

                        const rect = this.__selectTrigger.getBoundingClientRect();
                        content.style.setProperty('--select-trigger-width', `${rect.width}px`);
                        content.style.setProperty('--select-trigger-height', `${rect.height}px`);
                        content.style.setProperty('--select-available-height', `${Math.max(0, window.innerHeight - 16)}px`);
                    },
                    __selectSetOpen(open, focus = 'selected', restoreFocus = true) {
                        if (el.dataset.disabled !== undefined || this.__selectTrigger?.disabled) return;

                        this.__selectOpen = open;
                        this.$nextTick(() => {
                            if (! open) {
                                if (restoreFocus) {
                                    this.__selectTrigger?.focus({ preventScroll: true });
                                }

                                return;
                            }

                            this.__selectSyncDimensions();
                            const items = this.__selectItems();
                            const selected = items.find((item) => item.dataset.value === this.__selectValue);
                            const target = focus === 'last' ? items.at(-1) : (selected || items[0]);
                            target?.focus({ preventScroll: true });
                        });
                    },
                    __selectChoose(item) {
                        if (! item || item.hasAttribute('data-disabled')) return;

                        this.__selectValue = item.dataset.value;
                        this.__selectSetOpen(false);
                    },
                    __selectMove(direction) {
                        const items = this.__selectItems();
                        if (items.length === 0) return;

                        const current = items.indexOf(document.activeElement);
                        const index = current === -1 ? 0 : (current + direction + items.length) % items.length;
                        items[index].focus({ preventScroll: true });
                    },
                    __selectSearch(key) {
                        window.clearTimeout(this.__selectTypeaheadTimer);
                        this.__selectTypeahead += key.toLocaleLowerCase();
                        const items = this.__selectItems();
                        const current = Math.max(0, items.indexOf(document.activeElement));
                        const ordered = [...items.slice(current + 1), ...items.slice(0, current + 1)];
                        ordered.find((item) => item.textContent.trim().toLocaleLowerCase().startsWith(this.__selectTypeahead))
                            ?.focus({ preventScroll: true });
                        this.__selectTypeaheadTimer = window.setTimeout(() => this.__selectTypeahead = '', 500);
                    },
                    __selectHandleKeydown(event) {
                        if (event.key === 'ArrowDown' || event.key === 'ArrowUp') {
                            event.preventDefault();
                            this.__selectMove(event.key === 'ArrowDown' ? 1 : -1);
                        } else if (event.key === 'Home' || event.key === 'End') {
                            event.preventDefault();
                            const items = this.__selectItems();
                            (event.key === 'Home' ? items[0] : items.at(-1))?.focus({ preventScroll: true });
                        } else if (event.key === 'Enter' || event.key === ' ') {
                            event.preventDefault();
                            this.__selectChoose(document.activeElement);
                        } else if (event.key === 'Escape' || event.key === 'Tab') {
                            if (event.key === 'Escape') event.preventDefault();
                            this.__selectSetOpen(false, 'selected', event.key !== 'Tab');
                        } else if (event.key.length === 1 && ! event.ctrlKey && ! event.metaKey && ! event.altKey) {
                            this.__selectSearch(event.key);
                        }
                    },
                    destroy() {
                        window.clearTimeout(this.__selectTypeaheadTimer);
                    },
                };
            },
            'x-init'() {
                this.$nextTick(() => this.__selectUpdateLabel());
                this.__selectSyncInput();
                this.$watch('__selectValue', () => {
                    this.__selectUpdateLabel();
                    this.__selectSyncInput();
                });
            },
            'x-modelable': '__selectValue',
        });
    });

    Alpine.directive('select-value', (el) => {
        Alpine.bind(el, {
            'x-text'() { return this.__selectLabel || el.dataset.placeholder; },
        });
    });

    Alpine.directive('select-trigger', (el) => {
        const disabled = el.disabled;

        Alpine.bind(el, {
            'x-init'() {
                this.__selectTrigger = el;
                this.__selectTriggerId = el.id || this.__selectTriggerId;
                el.id = this.__selectTriggerId;
            },
            'x-bind:disabled'() {
                return disabled || el.closest('[data-slot="select"]')?.dataset.disabled !== undefined;
            },
            'x-on:click'() { this.__selectSetOpen(! this.__selectOpen); },
            'x-on:keydown'(event) {
                if (['Enter', ' ', 'ArrowDown', 'ArrowUp'].includes(event.key)) {
                    event.preventDefault();
                    this.__selectSetOpen(true, event.key === 'ArrowUp' ? 'last' : 'selected');
                }
            },
            'x-bind:aria-controls'() { return this.__selectContentId; },
            'x-bind:aria-expanded'() { return this.__selectOpen; },
            'x-bind:data-state'() { return this.__selectOpen ? 'open' : 'closed'; },
            'x-bind:data-placeholder'() { return ! this.__selectValue ? '' : null; },
        });
    });

    Alpine.directive('select-content', (el, { expression, modifiers }, { evaluate }) => {
        const direction = evaluate(expression)
            || evaluate('typeof __direction === "undefined" ? null : __direction');
        const anchorModifiers = resolveAnchorModifiers(el, modifiers, direction);

        Alpine.bind(el, {
            'x-init'() {
                this.__selectContentId = el.id || this.__selectContentId;
                el.id = this.__selectContentId;
                el.setAttribute('aria-labelledby', this.__selectTriggerId);
            },
            'x-show'() { return this.__selectOpen; },
            'x-on:keydown'(event) { this.__selectHandleKeydown(event); },
            'x-on:click.outside'() { this.__selectSetOpen(false, 'selected', false); },
            'x-bind:data-state'() { return this.__selectOpen ? 'open' : 'closed'; },
            [['x-anchor', ...anchorModifiers].join('.')]: '__selectTrigger',
        });
    });

    Alpine.directive('select-item', (el) => {
        Alpine.bind(el, {
            'x-on:pointermove'() { if (! el.hasAttribute('data-disabled')) el.focus({ preventScroll: true }); },
            'x-on:click'() { this.__selectChoose(el); },
            'x-bind:data-state'() { return this.__selectValue === el.dataset.value ? 'checked' : 'unchecked'; },
            'x-bind:aria-selected'() { return this.__selectValue === el.dataset.value; },
        });
    });

    Alpine.directive('select-item-indicator', (el) => {
        Alpine.bind(el, {
            'x-show'() { return this.__selectValue === el.dataset.value; },
            'x-bind:data-state'() { return this.__selectValue === el.dataset.value ? 'checked' : 'unchecked'; },
        });
    });
}
