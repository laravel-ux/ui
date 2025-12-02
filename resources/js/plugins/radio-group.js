export default (Alpine) => {
    Alpine.directive('radio-group', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __value: el.dataset.value,
                };
            },
            'x-modelable': '__value',
        });
    });

    Alpine.directive('radio-group-item', (el) => {
        const value = el.dataset.value;

        Alpine.bind(el, {
            'x-on:click'() {
                this.__value = value;
            },
            'x-bind:data-state'() {
                return this.__value === value ? 'checked' : 'unchecked';
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
