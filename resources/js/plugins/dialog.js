export default (Alpine) => {
    Alpine.directive('dialog', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __dialogOpen: evaluate(expression),
                    __dialogToggleOverflow() {
                        document.body.style.paddingRight = this.__dialogOpen
                            ? `${window.innerWidth - document.documentElement.clientWidth}px`
                            : '';
                        document.body.style.overflow = this.__dialogOpen ? 'hidden' : '';
                    },
                };
            },
            'x-init'() {
                this.__dialogToggleOverflow();
                this.$watch('__dialogOpen', () => {
                    this.__dialogToggleOverflow();
                });
            },
            'x-modelable': '__dialogOpen',
        });
    });

    Alpine.directive('dialog-overlay', (el) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__dialogOpen;
            },
            'x-on:click'() {
                this.__dialogOpen = false;
            },
            'x-bind:data-state'() {
                return this.__dialogOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('dialog-trigger', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__dialogOpen = ! this.__dialogOpen;
            },
            'x-bind:aria-expanded'() {
                return this.__dialogOpen;
            },
        });
    });

    Alpine.directive('dialog-content', (el) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__dialogOpen;
            },
            'x-bind:data-state'() {
                return this.__dialogOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('dialog-close', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__dialogOpen = false;
            },
        });
    });
}
