export default (Alpine) => {
    Alpine.directive('sidebar', (el, { expression }) => {
        Alpine.bind(el, {
            'x-bind:data-state'() {
                return this.__sidebarProviderOpen ? 'expanded' : 'collapsed'
            },
            'x-bind:data-collapsible'() {
                return this.__sidebarProviderOpen ? false : expression
            },
        });
    });

    Alpine.directive('sidebar-provider', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __sidebarProviderOpen: evaluate(expression),
                    __sidebarProviderIsMobile: false,
                };
            },
            'x-modelable': '__sidebarProviderOpen',
            'x-resize.document'() {
                this.__sidebarProviderIsMobile = this.$width < 768
            },
        });
    });

    Alpine.directive('sidebar-trigger', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__sidebarProviderOpen = ! this.__sidebarProviderOpen;
            },
        });
    });
}
