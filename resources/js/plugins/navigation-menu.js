export default (Alpine) => {
    Alpine.directive('navigation-menu-item', (el) => {
        Alpine.bind(el, {
            'x-data': function () {
                return {
                    __navigationMenuItemOpen: false,
                };
            },
            'x-modelable': '__navigationMenuItemOpen',
        });
    });

    Alpine.directive('navigation-menu-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-on:click': function () {
                this.__navigationMenuItemOpen = ! this.__navigationMenuItemOpen;
            },
            'x-bind:aria-expanded': function () {
                return this.__navigationMenuItemOpen;
            },
            'x-bind:data-state': function () {
                return this.__navigationMenuItemOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('navigation-menu-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-show': function () {
                return this.__navigationMenuItemOpen;
            },
            'x-on:click.outside': function () {
                this.__navigationMenuItemOpen = false;
            },
            'x-bind:data-state': function () {
                return this.__navigationMenuItemOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger',
        });
    });
}
