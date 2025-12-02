export default (Alpine) => {
    Alpine.directive('dialog', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __isOpen: el.dataset.state === 'open',
                    __syncState() {
                        if (this.__isOpen) {
                            this.__lockScroll();
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
                };
            },
            'x-init'() {
                this.__syncState();
                this.$watch('__isOpen', () => {
                    this.__syncState();
                });
            },
            'x-modelable': '__isOpen',
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('dialog-overlay', (el) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__isOpen;
            },
            'x-on:click'() {
                this.__isOpen = false;
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('dialog-trigger', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__isOpen = ! this.__isOpen;
            },
            'x-bind:aria-expanded'() {
                return this.__isOpen;
            },
        });
    });

    Alpine.directive('dialog-content', (el) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__isOpen;
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('dialog-close', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__isOpen = false;
            },
        });
    });
}
