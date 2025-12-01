export default (Alpine) => {
    Alpine.directive('tooltip', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __isOpen: false,
                };
            },
            'x-modelable': '__isOpen'
        });
    });

    Alpine.directive('tooltip-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-on:mouseenter'() {
                this.__isOpen = true;
            },
            'x-on:mouseleave'() {
                this.__isOpen = false;
            }
        });
    });

    Alpine.directive('tooltip-content', (el, { modifiers }) => {
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
