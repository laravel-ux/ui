export default (Alpine) => {
    Alpine.directive('hover-card', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __isOpen: false,
                };
            },
            'x-modelable': '__isOpen',
        });
    });

    Alpine.directive('hover-card-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-on:mouseenter'() {
                this.__isOpen = true;
            },
            'x-on:mouseleave'() {
                this.__isOpen = false;
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
            'x-bind:aria-expanded'() {
                return this.__isOpen;
            },
        });
    });

    Alpine.directive('hover-card-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__isOpen;
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger'
        });
    });
}
