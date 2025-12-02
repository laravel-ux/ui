export default (Alpine) => {
    Alpine.directive('switch', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __checked: el.dataset.state === 'checked',
                };
            },
            'x-modelable': '__checked',
            'x-on:click'() {
                this.__checked = ! this.__checked;
            },
            'x-bind:data-state'() {
                return this.__checked ? 'checked' : 'unchecked';
            },
            'x-bind:aria-checked'() {
                return this.__checked;
            },
        });
    });

    Alpine.directive('switch-thumb', (el) => {
        Alpine.bind(el, {
            'x-bind:data-state'() {
                return this.__checked ? 'checked' : 'unchecked';
            },
        });
    });
}
