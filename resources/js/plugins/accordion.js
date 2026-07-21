export default (Alpine) => {
    let nextId = 0;

    const getItem = (el) => el.closest('[data-slot="accordion-item"]');
    const getItemValue = (el) => getItem(el)?.dataset.value;
    const isItemDisabled = (el) => getItem(el)?.hasAttribute('data-disabled') ?? false;
    const isAccordionDisabled = (el) => el.closest('[data-slot="accordion"]')?.hasAttribute('data-disabled') ?? false;
    const ensureItemId = (el) => {
        const item = getItem(el) ?? el;

        if (! item.dataset.accordionId) {
            item.dataset.accordionId = `ux-accordion-${++nextId}`;
        }

        return item.dataset.accordionId;
    };
    const parseValue = (value) => {
        try {
            return JSON.parse(value);
        } catch {
            return value || null;
        }
    };

    Alpine.directive('accordion', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                const multiple = el.hasAttribute('data-multiple');
                const value = parseValue(el.dataset.value);

                return {
                    __value: multiple
                        ? (Array.isArray(value) ? value : (value == null ? [] : [value]))
                        : (Array.isArray(value) ? (value[0] ?? null) : value),
                    __multiple: multiple,
                    __isAccordionItemOpen(value) {
                        return this.__multiple
                            ? (Array.isArray(this.__value) && this.__value.includes(value))
                            : this.__value === value;
                    },
                    __toggleAccordionItem(value) {
                        if (this.__multiple) {
                            const currentValue = Array.isArray(this.__value) ? this.__value : [];

                            this.__value = currentValue.includes(value)
                                ? currentValue.filter((item) => item !== value)
                                : [...currentValue, value];

                            return;
                        }

                        this.__value = this.__value === value ? null : value;
                    },
                };
            },
            'x-modelable': '__value',
        });
    });

    Alpine.directive('accordion-item', (el) => {
        ensureItemId(el);

        Alpine.bind(el, {
            'x-bind:data-state'() {
                return this.__isAccordionItemOpen(el.dataset.value)
                    ? 'open'
                    : 'closed';
            },
        });
    });

    Alpine.directive('accordion-trigger', (el) => {
        const value = getItemValue(el);
        const id = ensureItemId(el);

        Alpine.bind(el, {
            'id': `${id}-trigger`,
            'x-on:click'() {
                if (! isAccordionDisabled(el) && ! isItemDisabled(el)) {
                    this.__toggleAccordionItem(value);
                }
            },
            'x-bind:data-state'() {
                return this.__isAccordionItemOpen(value)
                    ? 'open'
                    : 'closed';
            },
            'x-bind:aria-expanded'() {
                return this.__isAccordionItemOpen(value);
            },
            'x-bind:aria-controls'() {
                return `${id}-content`;
            },
            'x-bind:disabled'() {
                return isAccordionDisabled(el) || isItemDisabled(el);
            },
        });
    });

    Alpine.directive('accordion-content', (el) => {
        const value = getItemValue(el);
        const id = ensureItemId(el);

        Alpine.bind(el, {
            'id': `${id}-content`,
            'x-show'() {
                return this.__isAccordionItemOpen(value);
            },
            'x-bind:data-state'() {
                return this.__isAccordionItemOpen(value)
                    ? 'open'
                    : 'closed';
            },
            'x-bind:aria-labelledby'() {
                return `${id}-trigger`;
            },
            'x-collapse': '',
        });
    });
}
