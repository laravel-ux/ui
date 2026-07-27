const parseValue = (value, type) => {
    if (type !== 'multiple') return value || null;
    if (! value) return [];

    try {
        const parsed = JSON.parse(value);

        return Array.isArray(parsed) ? parsed.map(String) : [];
    } catch {
        return [String(value)];
    }
};

export default (Alpine) => {
    Alpine.directive('toggle-group', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                const type = el.dataset.type === 'multiple' ? 'multiple' : 'single';

                return {
                    __value: parseValue(el.dataset.value, type),
                    __toggleGroupFocusValue: null,
                    __toggleGroupItems() {
                        return [...el.querySelectorAll('[data-slot="toggle-group-item"]')]
                            .filter(item => item.closest('[data-slot="toggle-group"]') === el);
                    },
                    __toggleGroupEnabledItems() {
                        return this.__toggleGroupItems().filter(item => ! item.disabled);
                    },
                    __toggleGroupIsPressed(value) {
                        return type === 'multiple'
                            ? Array.isArray(this.__value) && this.__value.includes(value)
                            : this.__value === value;
                    },
                    __toggleGroupToggle(item) {
                        if (! item || item.disabled) return;

                        const value = item.dataset.value;
                        this.__toggleGroupFocusValue = value;

                        if (type === 'multiple') {
                            const current = Array.isArray(this.__value) ? this.__value : [];
                            this.__value = current.includes(value)
                                ? current.filter(itemValue => itemValue !== value)
                                : [...current, value];
                            return;
                        }

                        this.__value = this.__value === value ? null : value;
                    },
                    __toggleGroupMove(event, item) {
                        const items = this.__toggleGroupEnabledItems();
                        const currentIndex = items.indexOf(item);

                        if (currentIndex === -1) return;

                        const orientation = el.dataset.orientation || 'horizontal';
                        const direction = getComputedStyle(el).direction;
                        const previousKey = orientation === 'vertical'
                            ? 'ArrowUp'
                            : direction === 'rtl' ? 'ArrowRight' : 'ArrowLeft';
                        const nextKey = orientation === 'vertical'
                            ? 'ArrowDown'
                            : direction === 'rtl' ? 'ArrowLeft' : 'ArrowRight';
                        let nextIndex = null;

                        if (event.key === previousKey) nextIndex = (currentIndex - 1 + items.length) % items.length;
                        if (event.key === nextKey) nextIndex = (currentIndex + 1) % items.length;
                        if (event.key === 'Home') nextIndex = 0;
                        if (event.key === 'End') nextIndex = items.length - 1;
                        if (nextIndex === null) return;

                        event.preventDefault();
                        this.__toggleGroupFocusValue = items[nextIndex].dataset.value;
                        items[nextIndex].focus({ preventScroll: true });
                    },
                    __toggleGroupTabStop() {
                        const enabled = this.__toggleGroupEnabledItems();

                        return enabled.find(item => item.dataset.value === this.__toggleGroupFocusValue)
                            || enabled.find(item => this.__toggleGroupIsPressed(item.dataset.value))
                            || enabled[0];
                    },
                };
            },
            'x-modelable': '__value',
        });
    });

    Alpine.directive('toggle-group-item', (el) => {
        const value = el.dataset.value;

        Alpine.bind(el, {
            'x-on:click'() {
                this.__toggleGroupToggle(el);
            },
            'x-on:focus'() {
                this.__toggleGroupFocusValue = value;
            },
            'x-on:keydown'(event) {
                this.__toggleGroupMove(event, el);
            },
            'x-bind:tabindex'() {
                return this.__toggleGroupTabStop() === el ? 0 : -1;
            },
            'x-bind:data-state'() {
                return this.__toggleGroupIsPressed(value) ? 'on' : 'off';
            },
            'x-bind:aria-pressed'() {
                return this.__toggleGroupIsPressed(value) ? 'true' : 'false';
            },
        });
    });
}
