export default (Alpine) => {
    Alpine.directive('sheet', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-data': function () {
                return {
                    __sheetOpen: evaluate(expression),
                    __sheetToggleOverflow: function () {
                        document.body.style.overflow = this.__sheetOpen ? 'hidden' : '';
                    },
                };
            },
            'x-init': function () {
                if (this.__sheetOpen) {
                    this.__sheetToggleOverflow();
                }

                this.$watch('__sheetOpen', () => { this.__sheetToggleOverflow() })
            },
            'x-modelable': '__sheetOpen',
        });
    });

    Alpine.directive('sheet-overlay', (el) => {
        Alpine.bind(el, {
            'x-show': function () {
                return this.__sheetOpen;
            },
            'x-on:click': function () {
                this.__sheetOpen = false;
            },
            'x-bind:data-state': function () {
                return this.__sheetOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('sheet-trigger', (el) => {
        Alpine.bind(el, {
            'x-on:click': function () {
                this.__sheetOpen = ! this.__sheetOpen;
            },
            'x-bind:aria-expanded': function () {
                return this.__sheetOpen;
            },
        });
    });

    Alpine.directive('sheet-content', (el) => {
        Alpine.bind(el, {
            'x-show': function () {
                return this.__sheetOpen;
            },
            'x-bind:data-state': function () {
                return this.__sheetOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('sheet-close', (el) => {
        Alpine.bind(el, {
            'x-on:click': function () {
                this.__sheetOpen = false;
            },
        });
    });
}
