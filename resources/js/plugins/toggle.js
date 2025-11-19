export default (Alpine) => {
    Alpine.directive('toggle', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-data': function () {
                return {
                    __togglePressed: evaluate(expression),
                };
            },
            'x-modelable': '__togglePressed',
            'x-on:click': function () {
                this.__togglePressed = ! this.__togglePressed;
            },
            'x-bind:data-state': function () {
                return this.__togglePressed ? 'on' : 'off';
            },
        });
    });
}
