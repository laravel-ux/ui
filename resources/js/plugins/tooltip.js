export default (Alpine) => {
    Alpine.directive('tooltip', (el) => {
        Alpine.bind(el, {
            'x-data': function () {
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
            'x-on:mouseenter': function () {
                this.__tooltipOpen = true;
            },
            'x-on:mouseleave': function () {
                this.__tooltipOpen = false;
            }
        });
    });

    Alpine.directive('tooltip-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-show': function () {
                return this.__tooltipOpen;
            },
            'x-bind:data-state': function () {
                return this.__tooltipOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger'
        });
    });
}
