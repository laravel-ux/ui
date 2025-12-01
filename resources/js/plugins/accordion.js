export default (Alpine) => {
    const getItemValue = (el) => el.closest('[data-slot="accordion-item"]')?.getAttribute('value');

    Alpine.directive('accordion', (el) => {
        const value = el.getAttribute('value');

        Alpine.bind(el, {
            'x-data'() {
                return {
                    __value: value,
                };
            },
            'x-modelable': '__value',
        });
    });

    Alpine.directive('accordion-item', (el) => {
        const value = el.getAttribute('value');

        Alpine.bind(el, {
            'x-bind:data-state'() {
                return this.__value === value
                    ? 'open'
                    : 'closed';
            },
        });
    });

    Alpine.directive('accordion-trigger', (el) => {
        const value = getItemValue(el);

        Alpine.bind(el, {
            'x-on:click'() {
                this.__value = this.__value === value
                    ? null
                    : value;
            },
            'x-bind:data-state'() {
                return this.__value === value
                    ? 'open'
                    : 'closed';
            },
            'x-bind:aria-expanded'() {
                return this.__value === value;
            },
        });
    });

    Alpine.directive('accordion-content', (el) => {
        const value = getItemValue(el);

        Alpine.bind(el, {
            'x-show'() {
                return this.__value === value;
            },
            'x-collapse': '',
        });
    });
}
