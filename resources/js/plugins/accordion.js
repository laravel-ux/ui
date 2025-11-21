export default (Alpine) => {
    Alpine.directive('accordion', (el, { expression }) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __accordionValue: expression,
                };
            },
            'x-modelable': '__accordionValue',
        });
    });

    Alpine.directive('accordion-trigger', (el, { expression }) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__accordionValue = (this.__accordionValue === expression ? '' : expression);
            },
            'x-bind:data-state'() {
                return this.__accordionValue === expression ? 'open' : 'closed';
            },
            'x-bing:aria-expanded'() {
                return this.__accordionValue = expression;
            },
        });
    });

    Alpine.directive('accordion-content', (el, { expression }) => {
        Alpine.bind(el, {
            'x-collapse': '',
            'x-show'() {
                return this.__accordionValue === expression;
            }
        });
    });
}
