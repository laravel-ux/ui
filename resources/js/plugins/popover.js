let popoverId = 0;

const resolveAnchorModifiers = (el, modifiers, direction) => {
    const resolved = [...modifiers];
    const side = resolved[0];

    if (side === 'inline-start' || side === 'inline-end') {
        const isStart = side === 'inline-start';
        const isRtl = (el.getAttribute('dir') || direction || document.documentElement.dir) === 'rtl';

        resolved[0] = isStart === isRtl ? 'right' : 'left';
    }

    return resolved;
};

export default (Alpine) => {
    Alpine.directive('popover', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                const id = `popover-${++popoverId}`;

                return {
                    __isOpen: false,
                    __popoverContentId: `${id}-content`,
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
            'x-bind:aria-controls'() {
                return this.__popoverContentId;
            },
        });
    });

    Alpine.directive('popover-content', (el, { expression, modifiers }, { evaluate }) => {
        const direction = evaluate(expression)
            || evaluate('typeof __direction === "undefined" ? null : __direction');
        const anchorModifiers = resolveAnchorModifiers(el, modifiers, direction);

        Alpine.bind(el, {
            'x-init'() {
                this.__popoverContent = el;
                this.__popoverContentId = el.id || this.__popoverContentId;
                el.id = this.__popoverContentId;
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
