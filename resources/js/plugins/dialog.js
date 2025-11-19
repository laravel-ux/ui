export default (Alpine) => {
    Alpine.directive('dialog', (el, { expression }) => {
        Alpine.bind(el, {
            'x-data': function () {
                return {
                    __dialogOpen: expression,
                    __dialogToggleOverflow: function () {
                        document.body.style.overflow = this.__dialogOpen ? 'hidden' : '';
                    },
                };
            },
            'x-init': function () {
                if (this.__dialogOpen) {
                    this.__dialogToggleOverflow();
                }

                this.$watch('__dialogOpen', () => { this.__dialogToggleOverflow() })
            },
            'x-modelable': '__dialogOpen',
        });
    });

    Alpine.directive('dialog-overlay', (el) => {
        Alpine.bind(el, {
            'x-show': function () {
                return this.__dialogOpen;
            },
            'x-on:click': function () {
                this.__dialogOpen = false;
            },
            'x-bind:data-state': function () {
                return this.__dialogOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('dialog-trigger', (el) => {
        Alpine.bind(el, {
            'x-on:click': function () {
                this.__dialogOpen = ! this.__dialogOpen;
            },
            'x-bind:aria-expanded': function () {
                return this.__dialogOpen;
            },
        });
    });

    Alpine.directive('dialog-content', (el) => {
        Alpine.bind(el, {
            'x-show': function () {
                return this.__dialogOpen;
            },
            'x-bind:data-state': function () {
                return this.__dialogOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('dialog-close', (el) => {
        Alpine.bind(el, {
            'x-on:click': function () {
                this.__dialogOpen = false;
            },
        });
    });
}
