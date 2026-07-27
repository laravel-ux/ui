let tooltipId = 0;
let activeTooltip = null;

export default (Alpine) => {
    Alpine.directive('tooltip', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __isOpen: false,
                    __tooltipId: `tooltip-${++tooltipId}`,
                    __tooltipTrigger: null,
                    __tooltipOpenTimer: null,
                    __tooltipCloseTimer: null,
                    __tooltipDeactivate: null,
                    __tooltipPointerDown: false,
                    __tooltipOpen() {
                        clearTimeout(this.__tooltipCloseTimer);
                        clearTimeout(this.__tooltipOpenTimer);

                        const delay = Number(el.dataset.delayDuration) || 0;

                        this.__tooltipOpenTimer = setTimeout(() => {
                            activeTooltip?.();

                            this.__isOpen = true;
                            this.__tooltipDeactivate = () => {
                                this.__isOpen = false;
                            };
                            activeTooltip = this.__tooltipDeactivate;
                        }, delay);
                    },
                    __tooltipClose(delay = 0) {
                        clearTimeout(this.__tooltipOpenTimer);
                        clearTimeout(this.__tooltipCloseTimer);

                        this.__tooltipCloseTimer = setTimeout(() => {
                            this.__tooltipCloseNow();
                        }, delay);
                    },
                    __tooltipCloseNow() {
                        clearTimeout(this.__tooltipOpenTimer);
                        clearTimeout(this.__tooltipCloseTimer);
                        this.__isOpen = false;

                        if (activeTooltip === this.__tooltipDeactivate) {
                            activeTooltip = null;
                        }
                    },
                    destroy() {
                        this.__tooltipCloseNow();
                    },
                };
            },
            'x-modelable': '__isOpen',
        });
    });

    Alpine.directive('tooltip-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-init'() {
                this.__tooltipTrigger = el;
            },
            'x-on:pointerenter'(event) {
                if (event.pointerType !== 'touch') this.__tooltipOpen();
            },
            'x-on:pointerleave'(event) {
                if (event.pointerType !== 'touch') this.__tooltipClose(100);
            },
            'x-on:focus'() {
                if (! this.__tooltipPointerDown) this.__tooltipOpen();
            },
            'x-on:blur'() {
                this.__tooltipCloseNow();
            },
            'x-on:pointerdown'() {
                this.__tooltipPointerDown = true;
                this.__tooltipCloseNow();
            },
            'x-on:pointerup.window'() {
                this.__tooltipPointerDown = false;
            },
            'x-on:pointercancel.window'() {
                this.__tooltipPointerDown = false;
            },
            'x-on:keydown.escape'() {
                this.__tooltipCloseNow();
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
            'x-bind:aria-describedby'() {
                return this.__isOpen ? this.__tooltipId : null;
            },
        });
    });

    Alpine.directive('tooltip-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-init'() {
                this.__tooltipId = el.id || this.__tooltipId;
                el.id = this.__tooltipId;
            },
            'x-show'() {
                return this.__isOpen;
            },
            'x-on:pointerenter'(event) {
                if (event.pointerType !== 'touch') {
                    clearTimeout(this.__tooltipCloseTimer);
                }
            },
            'x-on:pointerleave'(event) {
                if (event.pointerType !== 'touch') this.__tooltipClose(100);
            },
            'x-on:keydown.escape'() {
                this.__tooltipCloseNow();
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...modifiers].join('.')]: '__tooltipTrigger',
        });
    });
}
