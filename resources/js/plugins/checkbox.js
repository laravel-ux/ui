export default (Alpine) => {
    Alpine.directive('checkbox', (el, { expression }) => {
        Alpine.bind(el, {
            'x-cloak': '',
            'x-data': function () {
                return {
                    __checkboxChecked: expression,
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
            'x-cloak': '',
            'x-show': function () {
                return this.__checkboxChecked;
            },
            'x-bind:data-state': function () {
                return this.__checkboxChecked ? 'checked' : 'unchecked';
            },
        });
    });
}
