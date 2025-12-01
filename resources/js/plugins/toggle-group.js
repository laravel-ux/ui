export default (Alpine) => {
    Alpine.directive('toggle-group', (el) => {
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

    Alpine.directive('toggle-group-item', (el) => {
        const value = el.getAttribute('value');

        Alpine.bind(el, {
            'x-on:click'() {
                this.__value = value;
            },
            'x-bind:tabindex'() {
                return this.__value === value ? 0 : -1;
            },
            'x-bind:data-state'() {
                return this.__value === value ? 'on' : 'off';
            },
            'x-bind:aria-pressed'() {
                return this.__value === value ? 'true' : 'false';
            },
        });
    });
}
