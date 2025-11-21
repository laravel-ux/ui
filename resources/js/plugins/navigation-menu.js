export default (Alpine) => {
    Alpine.directive('navigation-menu-item', (el) => {
        Alpine.bind(el, {
            'x-data'(){
                return {
                    __navigationMenuItemOpen: false,
                };
            },
            'x-modelable': '__navigationMenuItemOpen',
        });
    });

    Alpine.directive('navigation-menu-close', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__navigationMenuItemOpen = false;
            },
        });
    });

    Alpine.directive('navigation-menu-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-on:click'(){
                this.__navigationMenuItemOpen = ! this.__navigationMenuItemOpen;
            },
            'x-bind:aria-expanded'(){
                return this.__navigationMenuItemOpen;
            },
            'x-bind:data-state'(){
                return this.__navigationMenuItemOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('navigation-menu-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-show'(){
                return this.__navigationMenuItemOpen;
            },
            'x-on:click.outside'(){
                this.__navigationMenuItemOpen = false;
            },
            'x-bind:data-state'(){
                return this.__navigationMenuItemOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger',
        });
    });
}
