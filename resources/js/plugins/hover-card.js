export default (Alpine) => {
    Alpine.directive('hover-card', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __toggleGroupValue: false,
                };
            },
            'x-modelable': '__hoverCardOpen',
        });
    });

    Alpine.directive('hover-card-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-on:mouseenter'() {
                this.__hoverCardOpen = true;
            },
            'x-on:mouseleave'() {
                this.__hoverCardOpen = false;
            },
            'x-bind:aria-expanded'() {
                return this.__hoverCardOpen;
            },
        });
    });

    Alpine.directive('hover-card-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__hoverCardOpen;
            },
            'x-bind:data-state'() {
                return this.__hoverCardOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger'
        });
    });
}
