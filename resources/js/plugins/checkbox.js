export default (Alpine) => {
    Alpine.directive('checkbox', (el) => {
        const checked = el.querySelector('input[type="checkbox"]').checked;

        Alpine.bind(el, {
            'x-data'() {
                return {
                    __checked: checked,
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

    Alpine.directive('checkbox-indicator', (el) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__checked;
            },
            'x-bind:data-state'() {
                return this.__checked ? 'checked' : 'unchecked';
            },
        });
    });
}
