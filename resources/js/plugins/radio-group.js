export default (Alpine) => {
    Alpine.directive('radio-group', (el, { expression }) => {
        Alpine.bind(el, {
            'x-data': function () {
                return {
                    __radioGroupValue: expression,
                };
            },
            'x-modelable': '__radioGroupValue',
        });
    });

    Alpine.directive('radio-group-item', (el, { expression }) => {
        Alpine.bind(el, {
            'x-on:click': function () {
                this.__radioGroupValue = expression;
            },
            'x-bind:data-state': function () {
                return this.__radioGroupValue === expression ? 'checked' : 'unchecked';
            },
            'x-bind:aria-checked': function () {
                return this.__radioGroupValue === expression;
            },
        });
    });

    Alpine.directive('radio-group-indicator', (el, { expression }) => {
        Alpine.bind(el, {
            'x-show': function () {
                return this.__radioGroupValue === expression;
            },
            'x-bind:data-state': function () {
                return this.__radioGroupValue === expression ? 'checked' : 'unchecked';
            },
        });
    });
}
