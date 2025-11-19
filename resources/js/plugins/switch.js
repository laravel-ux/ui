export default (Alpine) => {
    Alpine.directive('switch', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-data': function () {
                return {
                    __switchChecked: evaluate(expression),
                };
            },
            'x-modelable': '__switchChecked',
            'x-on:click': function () {
                this.__switchChecked = ! this.__switchChecked;
            },
            'x-bind:data-state': function () {
                return this.__switchChecked ? 'checked' : 'unchecked';
            },
            'x-bind:aria-checked': function () {
                return this.__switchChecked;
            },
        });
    });

    Alpine.directive('switch-thumb', (el) => {
        Alpine.bind(el, {
            'x-bind:data-state': function () {
                return this.__switchChecked ? 'checked' : 'unchecked';
            },
        });
    });
}
