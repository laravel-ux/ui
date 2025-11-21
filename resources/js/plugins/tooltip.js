export default (Alpine) => {
    Alpine.directive('tooltip', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __tooltipOpen: false,
                };
            },
            'x-modelable': '__tooltipOpen'
        });
    });

    Alpine.directive('tooltip-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-on:mouseenter'() {
                this.__tooltipOpen = true;
            },
            'x-on:mouseleave'() {
                this.__tooltipOpen = false;
            }
        });
    });

    Alpine.directive('tooltip-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__tooltipOpen;
            },
            'x-bind:data-state'() {
                return this.__tooltipOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger'
        });
    });
}
