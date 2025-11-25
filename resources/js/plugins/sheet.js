export default (Alpine) => {
    Alpine.directive('sheet', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __sheetOpen: evaluate(expression),
                    __toggleSheetOverflow() {
                        document.body.style.paddingRight = this.__sheetOpen
                            ? `${window.innerWidth - document.documentElement.clientWidth}px`
                            : '';
                        document.body.style.overflow = this.__sheetOpen ? 'hidden' : '';
                    },
                };
            },
            'x-init'() {
                this.__toggleSheetOverflow();
                this.$watch('__sheetOpen', () => {
                    this.__toggleSheetOverflow();
                })
            },
            'x-modelable': '__sheetOpen',
        });
    });

    Alpine.directive('sheet-overlay', (el) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__sheetOpen;
            },
            'x-on:click'() {
                this.__sheetOpen = false;
            },
            'x-bind:data-state'() {
                return this.__sheetOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('sheet-trigger', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__sheetOpen = ! this.__sheetOpen;
            },
            'x-bind:aria-expanded'() {
                return this.__sheetOpen;
            },
        });
    });

    Alpine.directive('sheet-content', (el) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__sheetOpen;
            },
            'x-bind:data-state'() {
                return this.__sheetOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('sheet-close', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__sheetOpen = false;
            },
        });
    });
}
