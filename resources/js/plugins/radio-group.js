export default (Alpine) => {
    Alpine.directive('radio-group', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __value: el.dataset.value || null,
                    __radioGroupItems() {
                        return [...el.querySelectorAll('[data-slot="radio-group-item"]')];
                    },
                    __radioGroupEnabledItems() {
                        return this.__radioGroupItems().filter((item) => ! item.disabled);
                    },
                    __radioGroupSelect(item, focus = false) {
                        if (! item || item.disabled || el.dataset.disabled !== undefined) return;

                        this.__value = item.dataset.value;
                        if (focus) item.focus({ preventScroll: true });
                    },
                    __radioGroupMove(event, item) {
                        const items = this.__radioGroupEnabledItems();
                        const currentIndex = items.indexOf(item);

                        if (currentIndex === -1) return;

                        const direction = getComputedStyle(el).direction;
                        const previousKeys = direction === 'rtl'
                            ? ['ArrowRight', 'ArrowUp']
                            : ['ArrowLeft', 'ArrowUp'];
                        const nextKeys = direction === 'rtl'
                            ? ['ArrowLeft', 'ArrowDown']
                            : ['ArrowRight', 'ArrowDown'];
                        let nextIndex = null;

                        if (previousKeys.includes(event.key)) nextIndex = (currentIndex - 1 + items.length) % items.length;
                        if (nextKeys.includes(event.key)) nextIndex = (currentIndex + 1) % items.length;
                        if (event.key === 'Home') nextIndex = 0;
                        if (event.key === 'End') nextIndex = items.length - 1;

                        if (nextIndex === null) return;

                        event.preventDefault();
                        this.__radioGroupSelect(items[nextIndex], true);
                    },
                    __radioGroupSyncInput() {
                        const input = el.querySelector('[data-radio-group-input]');

                        if (! input) return;

                        input.value = this.__value ?? '';
                        input.disabled = el.dataset.disabled !== undefined || this.__value === null;
                    },
                };
            },
            'x-init'() {
                this.__radioGroupSyncInput();
                this.$watch('__value', () => this.__radioGroupSyncInput());
            },
            'x-modelable': '__value',
        });
    });

    Alpine.directive('radio-group-item', (el) => {
        const value = el.dataset.value;
        const disabled = el.disabled;

        Alpine.bind(el, {
            'x-bind:disabled'() {
                return disabled || el.closest('[data-slot="radio-group"]')?.dataset.disabled !== undefined;
            },
            'x-on:click'() {
                this.__radioGroupSelect(el);
            },
            'x-on:keydown'(event) {
                if (event.key === ' ') {
                    event.preventDefault();
                    this.__radioGroupSelect(el);
                    return;
                }

                this.__radioGroupMove(event, el);
            },
            'x-bind:tabindex'() {
                const enabled = this.__radioGroupEnabledItems();
                const selected = enabled.find((item) => item.dataset.value === this.__value);

                return el === (selected || enabled[0]) ? 0 : -1;
            },
            'x-bind:data-state'() {
                return this.__value === value ? 'checked' : 'unchecked';
            },
            'x-bind:data-checked'() {
                return this.__value === value ? '' : null;
            },
            'x-bind:aria-checked'() {
                return this.__value === value;
            },
        });
    });

    Alpine.directive('radio-group-indicator', (el) => {
        const value = el.dataset.value;

        Alpine.bind(el, {
            'x-show'() {
                return this.__value === value;
            },
            'x-bind:data-state'() {
                return this.__value === value ? 'checked' : 'unchecked';
            },
        });
    });
}
