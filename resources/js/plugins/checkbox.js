export default (Alpine) => {
    Alpine.directive('checkbox', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-data': function () {
                return {
                    __checkboxChecked: evaluate(expression),
                };
            },
            'x-modelable': '__checkboxChecked',
            'x-on:click': function () {
                this.__checkboxChecked = ! this.__checkboxChecked;
            },
            'x-bind:data-state': function () {
                return this.__checkboxChecked ? 'checked' : 'unchecked';
            },
            'x-bind:aria-checked': function () {
                return this.__checkboxChecked;
            },
        });
    });

    Alpine.directive('checkbox-indicator', (el) => {
        Alpine.bind(el, {
            'x-show': function () {
                return this.__checkboxChecked;
            },
            'x-bind:data-state': function () {
                return this.__checkboxChecked ? 'checked' : 'unchecked';
            },
        });
    });
}
