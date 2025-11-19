export default (Alpine) => {
    Alpine.directive('collapsible', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-data': function () {
                return {
                    __collapsibleOpen: evaluate(expression),
                };
            },
            'x-modelable': '__collapsibleOpen',
            'x-bind:data-state': function () {
                return this.__collapsibleOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('collapsible-trigger', (el) => {
        Alpine.bind(el, {
            'x-on:click': function () {
                this.__collapsibleOpen = ! this.__collapsibleOpen;
            },
            'x-bing:aria-expanded': function () {
                return this.__collapsibleOpen;
            },
        });
    });

    Alpine.directive('collapsible-content', (el) => {
        Alpine.bind(el, {
            'x-collapse': '',
            'x-show': function () {
                return this.__collapsibleOpen;
            },
            'x-bind:data-state': function () {
                return this.__collapsibleOpen ? 'open' : 'closed';
            },
        });
    });
}
