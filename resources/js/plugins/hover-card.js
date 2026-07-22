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
            'x-on:mouseenter'() {
                this.__hoverCardOpen(Number(el.dataset.hoverCardDelay));
            },
            'x-on:mouseleave'() {
                this.__hoverCardClose(Number(el.dataset.hoverCardCloseDelay));
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
            'x-bind:aria-expanded'() {
                return this.__isOpen;
            },
        });
    });

    Alpine.directive('hover-card-content', (el, { modifiers }) => {
        const anchorModifiers = [...modifiers];
        const side = anchorModifiers[0];

        if (side === 'inline-start' || side === 'inline-end') {
            const direction = el.getAttribute('dir') || document.documentElement.getAttribute('dir') || 'ltr';
            const isStart = side === 'inline-start';

            anchorModifiers[0] = isStart === (direction === 'rtl') ? 'right' : 'left';
        }

        Alpine.bind(el, {
            'x-show'() {
                return this.__isOpen;
            },
            'x-on:mouseenter'() {
                clearTimeout(this.__closeTimer);
            },
            'x-on:mouseleave'() {
                this.__hoverCardClose(Number(this.$refs.trigger.dataset.hoverCardCloseDelay));
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...anchorModifiers].join('.')]: '$refs.trigger'
        });
    });
}
