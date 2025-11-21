export default (Alpine) => {
    Alpine.directive('switch', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __switchChecked: evaluate(expression),
                };
            },
            'x-modelable': '__switchChecked',
            'x-on:click'() {
                this.__switchChecked = ! this.__switchChecked;
            },
            'x-bind:data-state'() {
                return this.__switchChecked ? 'checked' : 'unchecked';
            },
            'x-bind:aria-checked'() {
                return this.__switchChecked;
            },
        });
    });

    Alpine.directive('switch-thumb', (el) => {
        Alpine.bind(el, {
            'x-bind:data-state'() {
                return this.__switchChecked ? 'checked' : 'unchecked';
            },
        });
    });
}
