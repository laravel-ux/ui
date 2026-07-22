export default (Alpine) => {
    Alpine.directive('popover', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __isOpen: false,
                    __popoverTrigger: null,
                    __popoverContent: null,
                    __popoverSetOpen(open, restoreFocus = false) {
                        this.__isOpen = open;

                        this.$nextTick(() => {
                            if (open) {
                                this.__syncDimensions();
                                const autofocus = this.__popoverContent?.querySelector('[autofocus]');
                                (autofocus || this.__popoverContent)?.focus({ preventScroll: true });
                            } else if (restoreFocus) {
                                this.__popoverTrigger?.focus({ preventScroll: true });
                            }
                        });
                    },
                    __syncDimensions() {
                        const rect = this.__popoverTrigger?.getBoundingClientRect();

                        if (! rect || ! this.__popoverContent) return;

                        this.__popoverContent.style.setProperty(
                            '--popover-trigger-width',
                            `${rect.width}px`,
                        );
                    },
                };
            },
            'x-init'() {
                this.$watch('__isOpen', (open) => {
                    if (open) this.$nextTick(() => this.__syncDimensions());
                });
            },
            'x-modelable': '__isOpen',
        });
    });

    Alpine.directive('popover-trigger', (el) => {
        Alpine.bind(el, {
            'x-init'() {
                this.__popoverTrigger = el;
            },
            'x-on:click'() {
                this.__popoverSetOpen(! this.__isOpen);
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
            'x-bind:aria-expanded'() {
                return this.__isOpen;
            },
        });
    });

    Alpine.directive('popover-content', (el, { modifiers }) => {
        const anchorModifiers = [...modifiers];
        const side = anchorModifiers[0];

        if (side === 'inline-start' || side === 'inline-end') {
            const direction = el.getAttribute('dir') || document.documentElement.getAttribute('dir') || 'ltr';
            const isStart = side === 'inline-start';

            anchorModifiers[0] = isStart === (direction === 'rtl') ? 'right' : 'left';
        }

        Alpine.bind(el, {
            'x-init'() {
                this.__popoverContent = el;
            },
            'x-show'() {
                return this.__isOpen;
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
            'x-on:click.outside'() {
                this.__popoverSetOpen(false);
            },
            'x-on:keydown.escape.stop.prevent'() {
                this.__popoverSetOpen(false, true);
            },
            [['x-anchor', ...anchorModifiers].join('.')]: '__popoverTrigger'
        });
    });
}
