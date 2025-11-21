export default (Alpine) => {
    Alpine.directive('toggle-group', (el, { expression }) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __toggleGroupValue: expression,
                };
            },
            'x-modelable': '__toggleGroupValue',
        });
    });

    Alpine.directive('toggle-group-item', (el, { expression }) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__toggleGroupValue = expression;
            },
            'x-bind:tabindex'() {
                return this.__toggleGroupValue === expression ? 0 : -1;
            },
            'x-bind:data-state'() {
                return this.__toggleGroupValue === expression ? 'on' : 'off';
            },
        });
    });
}
