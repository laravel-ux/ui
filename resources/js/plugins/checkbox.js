export default (Alpine) => {
    Alpine.directive('checkbox', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __checkboxChecked: evaluate(expression),
                };
            },
            'x-modelable': '__checkboxChecked',
            'x-on:click'() {
                this.__checkboxChecked = ! this.__checkboxChecked;
            },
            'x-bind:data-state'() {
                return this.__checkboxChecked ? 'checked' : 'unchecked';
            },
            'x-bind:aria-checked'() {
                return this.__checkboxChecked;
            },
        });
    });

    Alpine.directive('checkbox-indicator', (el) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__checkboxChecked;
            },
            'x-bind:data-state'() {
                return this.__checkboxChecked ? 'checked' : 'unchecked';
            },
        });
    });
}
