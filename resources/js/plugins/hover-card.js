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
    Alpine.directive('hover-card', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __isOpen: false,
                    __openTimer: null,
                    __closeTimer: null,
                    __hoverCardOpen(delay = 0) {
                        clearTimeout(this.__closeTimer);
                        clearTimeout(this.__openTimer);
                        this.__openTimer = setTimeout(() => {
                            this.__isOpen = true;
                        }, delay);
                    },
                    __hoverCardClose(delay = 0) {
                        clearTimeout(this.__openTimer);
                        clearTimeout(this.__closeTimer);
                        this.__closeTimer = setTimeout(() => {
                            this.__isOpen = false;
                        }, delay);
                    },
                    destroy() {
                        clearTimeout(this.__openTimer);
                        clearTimeout(this.__closeTimer);
                    },
                };
            },
            'x-modelable': '__isOpen',
        });
    });

    Alpine.directive('hover-card-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-on:pointerenter'(event) {
                if (event.pointerType !== 'touch') {
                    this.__hoverCardOpen(Number(el.dataset.hoverCardDelay));
                }
            },
            'x-on:pointerleave'(event) {
                if (event.pointerType !== 'touch') {
                    this.__hoverCardClose(Number(el.dataset.hoverCardCloseDelay));
                }
            },
            'x-on:focus'() {
                this.__hoverCardOpen(Number(el.dataset.hoverCardDelay));
            },
            'x-on:blur'() {
                this.__hoverCardClose(Number(el.dataset.hoverCardCloseDelay));
            },
            'x-on:keydown.escape'() {
                clearTimeout(this.__openTimer);
                clearTimeout(this.__closeTimer);
                this.__isOpen = false;
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('hover-card-content', (el, { expression, modifiers }, { evaluate }) => {
        const direction = evaluate(expression)
            || evaluate('typeof __direction === "undefined" ? null : __direction');
        const anchorModifiers = resolveAnchorModifiers(el, modifiers, direction);

        Alpine.bind(el, {
            'x-show'() {
                return this.__isOpen;
            },
            'x-on:pointerenter'(event) {
                if (event.pointerType !== 'touch') clearTimeout(this.__closeTimer);
            },
            'x-on:pointerleave'(event) {
                if (event.pointerType !== 'touch') {
                    this.__hoverCardClose(Number(this.$refs.trigger.dataset.hoverCardCloseDelay));
                }
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...anchorModifiers].join('.')]: '$refs.trigger',
        });
    });
};
