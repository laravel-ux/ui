export default (Alpine) => {
    Alpine.directive('switch', (el, { expression }) => {
        Alpine.bind(el, {
            'x-cloak': '',
            'x-data': function () {
                return {
                    __switchChecked: expression,
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
            'x-cloak': '',
            'x-bind:data-state': function () {
                return this.__switchChecked ? 'checked' : 'unchecked';
            },
        });
    });
}
