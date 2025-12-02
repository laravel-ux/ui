export default (Alpine) => {
    Alpine.directive('popover', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __isOpen: false,
                    __syncState() {
                        if (this.__isOpen) {
                            this.__lockScroll();
                            this.__syncDimensions();
                        } else {
                            this.__unlockScroll();
                        }
                    },
                    __lockScroll() {
                        document.body.style.setProperty(
                            'padding-right',
                            `${window.innerWidth - document.documentElement.clientWidth}px`,
                        );
                        document.body.style.setProperty('overflow', 'hidden');
                    },
                    __unlockScroll() {
                        document.body.style.removeProperty('padding-right');
                        document.body.style.removeProperty('overflow');
                    },
                    __syncDimensions() {
                        const rect = this.$refs.trigger.getBoundingClientRect();
                        this.$refs.content.style.setProperty(
                            '--popover-trigger-width',
                            `${rect.width}px`,
                        );
                    },
                };
            },
            'x-init'() {
                this.__syncState();
                this.$watch('__isOpen', () => {
                    this.__syncState();
                });
            },
            'x-modelable': '__isOpen',
        });
    });

    Alpine.directive('popover-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-on:click'() {
                this.__isOpen = ! this.__isOpen;
            },
            'x-bind:aria-expanded'() {
                return this.__isOpen;
            },
        });
    });

    Alpine.directive('popover-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__isOpen;
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
            'x-on:click.outside'() {
                this.__isOpen = false;
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger'
        });
    });
}
