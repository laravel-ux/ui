export default (Alpine) => {
    Alpine.directive('tabs', (el, { expression }) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __tabsValue: expression,
                };
            },
            'x-modelable': '__tabsValue',
        });
    });

    Alpine.directive('tabs-trigger', (el, { expression }) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__tabsValue = expression;
            },
            'x-bind:data-state'() {
                return this.__tabsValue === expression ? 'active' : 'inactive';
            },
            'x-bind:aria-selected'() {
                return this.__tabsValue === expression;
            },
        });
    });

    Alpine.directive('tabs-content', (el, { expression }) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__tabsValue === expression;
            },
        });
    });
}
