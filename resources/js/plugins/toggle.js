export default (Alpine) => {
    Alpine.directive('toggle', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __togglePressed: evaluate(expression),
                };
            },
            'x-modelable': '__togglePressed',
            'x-on:click'() {
                this.__togglePressed = ! this.__togglePressed;
            },
            'x-bind:data-state'() {
                return this.__togglePressed ? 'on' : 'off';
            },
        });
    });
}
