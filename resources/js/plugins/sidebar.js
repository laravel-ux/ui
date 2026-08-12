export default (Alpine) => {
    Alpine.directive('sidebar', (el, { expression }) => {
        Alpine.bind(el, {
            'x-bind:data-state'() {
                return this.__sidebarProviderOpen ? 'expanded' : 'collapsed';
            },
            'x-bind:data-collapsible'() {
                return this.__sidebarProviderOpen ? false : expression;
            },
        });
    });

    Alpine.directive('sidebar-provider', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __sidebarProviderOpen: evaluate(expression),
                    __sidebarProviderOpenMobile: false,
                    __sidebarProviderIsMobile: false,
                    __sidebarProviderToggle() {
                        if (this.__sidebarProviderIsMobile) {
                            this.__sidebarProviderOpenMobile = ! this.__sidebarProviderOpenMobile;

                            return;
                        }

                        this.__sidebarProviderOpen = ! this.__sidebarProviderOpen;
                    },
                };
            },
            'x-modelable': '__sidebarProviderOpen',
            'x-init'() {
                this.$watch('__sidebarProviderOpen', (open) => {
                    document.cookie = `sidebar_state=${open}; path=/; max-age=${60 * 60 * 24 * 7}`;
                });
            },
            'x-resize.document'() {
                this.__sidebarProviderIsMobile = this.$width < 768;
            },
            'x-on:keydown.window'(event) {
                if (event.key === 'b' && (event.metaKey || event.ctrlKey)) {
                    event.preventDefault();
                    this.__sidebarProviderToggle();
                }
            },
        });
    });

    Alpine.directive('sidebar-trigger', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__sidebarProviderToggle();
            },
        });
    });
};
