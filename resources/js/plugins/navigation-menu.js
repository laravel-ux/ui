export default (Alpine) => {
    Alpine.directive('navigation-menu-item', (el) => {
        Alpine.bind(el, {
            'x-data'(){
                return {
                    __isOpen: false,
                };
            },
            'x-modelable': '__isOpen',
        });
    });

    Alpine.directive('navigation-menu-close', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__isOpen = false;
            },
        });
    });

    Alpine.directive('navigation-menu-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-on:click'(){
                this.__isOpen = ! this.__isOpen;
            },
            'x-bind:aria-expanded'(){
                return this.__isOpen;
            },
            'x-bind:data-state'(){
                return this.__isOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('navigation-menu-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-show'(){
                return this.__isOpen;
            },
            'x-on:click.outside'(){
                this.__isOpen = false;
            },
            'x-bind:data-state'(){
                return this.__isOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger',
        });
    });
}
