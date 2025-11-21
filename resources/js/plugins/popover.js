export default (Alpine) => {
    Alpine.directive('popover', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __popoverOpen: false,
                };
            },
            'x-modelable': '__popoverOpen',
        });
    });

    Alpine.directive('popover-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-on:click'() {
                this.__popoverOpen = ! this.__popoverOpen;
            },
            'x-bind:aria-expanded'() {
                return this.__popoverOpen;
            },
        });
    });

    Alpine.directive('popover-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__popoverOpen;
            },
            'x-bind:data-state'() {
                return this.__popoverOpen ? 'open' : 'closed';
            },
            'x-on:click.outside'() {
                this.__popoverOpen = false;
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger'
        });
    });
}
