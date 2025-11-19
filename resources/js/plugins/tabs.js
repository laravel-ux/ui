export default (Alpine) => {
    Alpine.directive('tabs', (el, { expression }) => {
        Alpine.bind(el, {
            'x-data': function () {
                return {
                    __tabsValue: expression,
                };
            },
            'x-modelable': '__tabsValue',
        });
    });

    Alpine.directive('tabs-trigger', (el, { expression }) => {
        Alpine.bind(el, {
            'x-on:click': function () {
                this.__tabsValue = expression;
            },
            'x-bind:data-state': function () {
                return this.__tabsValue === expression ? 'active' : 'inactive';
            },
            'x-bind:aria-selected': function () {
                return this.__tabsValue === expression;
            },
        });
    });

    Alpine.directive('tabs-content', (el, { expression }) => {
        Alpine.bind(el, {
            'x-show': function () {
                return this.__tabsValue === expression;
            },
        });
    });
}
