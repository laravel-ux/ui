export default (Alpine) => {
    Alpine.directive('hover-card', (el) => {
        Alpine.bind(el, {
            'x-data': function () {
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
            'x-on:mouseenter': function () {
                this.__hoverCardOpen = true;
            },
            'x-on:mouseleave': function () {
                this.__hoverCardOpen = false;
            },
            'x-bind:aria-expanded': function () {
                return this.__hoverCardOpen;
            },
        });
    });

    Alpine.directive('hover-card-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-show': function () {
                return this.__hoverCardOpen;
            },
            'x-bind:data-state': function () {
                return this.__hoverCardOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger'
        });
    });
}
