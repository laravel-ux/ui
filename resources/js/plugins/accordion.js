export default (Alpine) => {
    Alpine.directive('accordion', (el, { expression }) => {
        Alpine.bind(el, {
            'x-data': function () {
                return {
                    __accordionValue: expression,
                };
            },
            'x-modelable': '__accordionValue',
        });
    });

    Alpine.directive('accordion-trigger', (el, { expression }) => {
        Alpine.bind(el, {
            'x-on:click': function () {
                this.__accordionValue = (this.__accordionValue === expression ? '' : expression);
            },
            'x-bind:data-state': function () {
                return this.__accordionValue === expression ? 'open' : 'closed';
            },
            'x-bing:aria-expanded': function () {
                return this.__accordionValue = expression;
            },
        });
    });

    Alpine.directive('accordion-content', (el, { expression }) => {
        Alpine.bind(el, {
            'x-collapse': '',
            'x-show': function () {
                return this.__accordionValue === expression;
            }
        });
    });
}
