export default (Alpine) => {
    Alpine.directive('popover', (el) => {
        Alpine.bind(el, {
            'x-data': function () {
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
            'x-on:click': function () {
                this.__popoverOpen = ! this.__popoverOpen;
            },
            'x-bind:aria-expanded': function () {
                return this.__popoverOpen;
            },
        });
    });

    Alpine.directive('popover-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-show': function () {
                return this.__popoverOpen;
            },
            'x-bind:data-state': function () {
                return this.__popoverOpen ? 'open' : 'closed';
            },
            'x-on:click.outside': function () {
                this.__popoverOpen = false;
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger'
        });
    });
}
