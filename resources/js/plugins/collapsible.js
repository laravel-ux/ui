export default (Alpine) => {
    Alpine.directive('collapsible', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __collapsibleOpen: evaluate(expression),
                };
            },
            'x-modelable': '__collapsibleOpen',
            'x-bind:data-state'() {
                return this.__collapsibleOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('collapsible-trigger', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__collapsibleOpen = ! this.__collapsibleOpen;
            },
            'x-bing:aria-expanded'() {
                return this.__collapsibleOpen;
            },
        });
    });

    Alpine.directive('collapsible-content', (el) => {
        Alpine.bind(el, {
            'x-collapse': '',
            'x-show'() {
                return this.__collapsibleOpen;
            },
            'x-bind:data-state'() {
                return this.__collapsibleOpen ? 'open' : 'closed';
            },
        });
    });
}
