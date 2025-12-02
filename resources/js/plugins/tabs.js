export default (Alpine) => {
    Alpine.directive('tabs', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __value: el.dataset.value,
                };
            },
            'x-modelable': '__value',
        });
    });

    Alpine.directive('tabs-trigger', (el) => {
        const value = el.dataset.value;

        Alpine.bind(el, {
            'x-on:click'() {
                this.__value = value;
            },
            'x-bind:data-state'() {
                return this.__value === value ? 'active' : 'inactive';
            },
            'x-bind:aria-selected'() {
                return this.__value === value;
            },
        });
    });

    Alpine.directive('tabs-content', (el) => {
        const value = el.dataset.value;

        Alpine.bind(el, {
            'x-show'() {
                return this.__value === value;
            },
        });
    });
}
