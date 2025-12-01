export default (Alpine) => {
    Alpine.directive('collapsible', (el) => {
        const expanded = el.getAttribute('aria-expanded');

        Alpine.bind(el, {
            'x-data'() {
                return {
                    __isOpen: expanded === 'true',
                };
            },
            'x-modelable': '__isOpen',
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('collapsible-trigger', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__isOpen = ! this.__isOpen;
            },
            'x-bing:aria-expanded'() {
                return this.__isOpen;
            },
        });
    });

    Alpine.directive('collapsible-content', (el) => {
        Alpine.bind(el, {
            'x-collapse': '',
            'x-show'() {
                return this.__isOpen;
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
        });
    });
}
