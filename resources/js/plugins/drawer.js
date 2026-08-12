let drawerId = 0;
let scrollLockCount = 0;
let bodyOverflow = '';
let bodyPaddingRight = '';
const inertElements = new WeakMap();

const focusableSelector = [
    'a[href]',
    'button:not([disabled])',
    'input:not([disabled]):not([type="hidden"])',
    'select:not([disabled])',
    'textarea:not([disabled])',
    '[tabindex]:not([tabindex="-1"])',
].join(',');

const lockBodyScroll = () => {
    if (scrollLockCount === 0) {
        bodyOverflow = document.body.style.overflow;
        bodyPaddingRight = document.body.style.paddingRight;

        const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;

        if (scrollbarWidth > 0) {
            const paddingRight = Number.parseFloat(getComputedStyle(document.body).paddingRight) || 0;

            document.body.style.paddingRight = `${paddingRight + scrollbarWidth}px`;
        }

        document.body.style.overflow = 'hidden';
    }

    scrollLockCount += 1;
};

const unlockBodyScroll = () => {
    scrollLockCount = Math.max(0, scrollLockCount - 1);

    if (scrollLockCount === 0) {
        document.body.style.overflow = bodyOverflow;
        document.body.style.paddingRight = bodyPaddingRight;
    }
};

const makeElementInert = (element) => {
    const state = inertElements.get(element) || {
        count: 0,
        inert: element.inert,
    };

    state.count += 1;
    inertElements.set(element, state);
    element.inert = true;
};

const restoreElementInert = (element) => {
    const state = inertElements.get(element);

    if (! state) return;

    state.count -= 1;

    if (state.count === 0) {
        element.inert = state.inert;
        inertElements.delete(element);
    }
};

const parseSnapPoints = (value) => {
    try {
        const points = JSON.parse(value || '[]');
        return Array.isArray(points) ? points : [];
    } catch {
        return [];
    }
};

const snapPointPixels = (point, viewportSize) => {
    if (typeof point === 'number') return point <= 1 ? point * viewportSize : point;
    if (typeof point !== 'string') return viewportSize;
    if (point.endsWith('rem')) return Number.parseFloat(point) * Number.parseFloat(getComputedStyle(document.documentElement).fontSize);
    if (point.endsWith('px')) return Number.parseFloat(point);
    if (point.endsWith('%')) return Number.parseFloat(point) / 100 * viewportSize;
    return viewportSize;
};

const scrollableAncestor = (target, boundary) => {
    let element = target instanceof Element ? target : null;

    while (element && element !== boundary) {
        const style = getComputedStyle(element);
        if (/(auto|scroll)/.test(style.overflowY) && element.scrollHeight > element.clientHeight) return element;
        if (/(auto|scroll)/.test(style.overflowX) && element.scrollWidth > element.clientWidth) return element;
        element = element.parentElement;
    }

    return null;
};

export default (Alpine) => {
    Alpine.directive('drawer', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                const id = `drawer-${++drawerId}`;
                const direction = ['up', 'right', 'down', 'left'].includes(el.dataset.swipeDirection)
                    ? el.dataset.swipeDirection
                    : 'down';
                const modalValue = el.dataset.modal;
                const parentDrawer = el.parentElement?.closest('[data-slot="drawer"]');

                return {
                    __drawerId: id,
                    __contentId: `${id}-content`,
                    __titleId: `${id}-title`,
                    __descriptionId: `${id}-description`,
                    __isOpen: el.dataset.state === 'open',
                    __direction: direction,
                    __axis: ['up', 'down'].includes(direction) ? 'y' : 'x',
                    __showSwipeHandle: el.dataset.showSwipeHandle === 'true',
                    __modal: modalValue === 'false' ? false : (modalValue === 'trap-focus' ? 'trap-focus' : true),
                    __disablePointerDismissal: el.hasAttribute('data-disable-pointer-dismissal'),
                    __snapPoints: parseSnapPoints(el.dataset.snapPoints),
                    __snapIndex: 0,
                    __trigger: null,
                    __parentDrawerId: parentDrawer?.dataset.drawerOwner || null,
                    __previouslyFocused: null,
                    __isScrollLocked: false,
                    __inertElements: [],
                    __dragging: false,
                    __dragStarted: false,
                    __pointerId: null,
                    __dragStart: 0,
                    __dragLast: 0,
                    __dragLastTime: 0,
                    __movement: 0,
                    __swipeProgress: 0,
                    __optionsObserver: null,

                    __content() {
                        return document.getElementById(this.__contentId);
                    },

                    __popup() {
                        return document.querySelector(`[data-drawer-owner="${this.__drawerId}"][data-slot="drawer-popup"]`);
                    },

                    __setOpen(open) {
                        if (this.__isOpen === open) return;
                        this.__isOpen = open;
                    },

                    __syncOptions() {
                        const direction = ['up', 'right', 'down', 'left'].includes(el.dataset.swipeDirection)
                            ? el.dataset.swipeDirection
                            : 'down';
                        this.__direction = direction;
                        this.__axis = ['up', 'down'].includes(direction) ? 'y' : 'x';
                        this.__showSwipeHandle = el.dataset.showSwipeHandle === 'true';
                        this.$nextTick(() => {
                            this.__resetMovement();
                            this.__applySnapPoint();
                        });
                    },

                    __makeBackgroundInert() {
                        if (this.__modal !== true) return;
                        const owner = this.__drawerId;

                        this.__inertElements = [...document.body.children].filter((element) => (
                            element.dataset.drawerOwner !== owner
                            && element.tagName !== 'SCRIPT'
                            && element.tagName !== 'STYLE'
                        ));
                        this.__inertElements.forEach(makeElementInert);
                    },

                    __restoreBackground() {
                        this.__inertElements.forEach(restoreElementInert);
                        this.__inertElements = [];
                    },

                    __syncDrawer() {
                        if (this.__isOpen) {
                            this.__previouslyFocused = document.activeElement;

                            if (this.__modal === true && ! this.__isScrollLocked) {
                                lockBodyScroll();
                                this.__isScrollLocked = true;
                            }

                            this.$nextTick(() => {
                                if (this.__parentDrawerId) {
                                    const parentPopup = document.querySelector(`[data-drawer-owner="${this.__parentDrawerId}"][data-slot="drawer-popup"]`);
                                    parentPopup?.toggleAttribute('data-nested-drawer-open', true);
                                    parentPopup?.style.setProperty('--nested-drawers', '1');
                                    parentPopup?.style.setProperty('--drawer-frontmost-height', `${this.__popup()?.offsetHeight || 0}px`);
                                }
                                this.__makeBackgroundInert();
                                this.__applySnapPoint();
                                const popup = this.__popup();
                                popup?.style.setProperty('--drawer-height', `${popup.offsetHeight}px`);
                                const content = this.__content();
                                const focusTarget = content?.querySelector('[autofocus]') || content?.querySelector(focusableSelector) || content;
                                focusTarget?.focus({ preventScroll: true });
                            });
                            return;
                        }

                        if (this.__isScrollLocked) {
                            unlockBodyScroll();
                            this.__isScrollLocked = false;
                        }
                        this.__restoreBackground();
                        this.__resetMovement();
                        if (this.__parentDrawerId) {
                            const parentPopup = document.querySelector(`[data-drawer-owner="${this.__parentDrawerId}"][data-slot="drawer-popup"]`);
                            parentPopup?.removeAttribute('data-nested-drawer-open');
                            parentPopup?.removeAttribute('data-nested-drawer-swiping');
                            parentPopup?.style.removeProperty('--nested-drawers');
                            parentPopup?.style.removeProperty('--drawer-frontmost-height');
                        }

                        const focusTarget = this.__trigger || this.__previouslyFocused;
                        this.$nextTick(() => {
                            if (focusTarget instanceof HTMLElement && focusTarget.isConnected) focusTarget.focus({ preventScroll: true });
                        });
                    },

                    __trapFocus(event) {
                        if (event.key !== 'Tab' || this.__modal === false) return;
                        const content = this.__content();
                        const focusable = [...(content?.querySelectorAll(focusableSelector) || [])].filter((item) => item.offsetParent !== null);

                        if (focusable.length === 0) {
                            event.preventDefault();
                            content?.focus();
                            return;
                        }

                        const first = focusable[0];
                        const last = focusable[focusable.length - 1];
                        if (event.shiftKey && document.activeElement === first) {
                            event.preventDefault();
                            last.focus();
                        } else if (! event.shiftKey && document.activeElement === last) {
                            event.preventDefault();
                            first.focus();
                        }
                    },

                    __dismissDistance(delta) {
                        return ['down', 'right'].includes(this.__direction) ? delta : -delta;
                    },

                    __canDrag(target, delta) {
                        if (target instanceof Element && target.closest('[data-drawer-swipe-ignore]')) return false;
                        const scrollable = scrollableAncestor(target, this.__content());
                        if (! scrollable) return true;

                        if (this.__axis === 'y') {
                            if (this.__direction === 'down') return scrollable.scrollTop <= 0 && (delta > 0 || this.__snapPoints.length > 0);
                            return scrollable.scrollTop + scrollable.clientHeight >= scrollable.scrollHeight - 1 && (delta < 0 || this.__snapPoints.length > 0);
                        }

                        if (this.__direction === 'right') return scrollable.scrollLeft <= 0 && (delta > 0 || this.__snapPoints.length > 0);
                        return scrollable.scrollLeft + scrollable.clientWidth >= scrollable.scrollWidth - 1 && (delta < 0 || this.__snapPoints.length > 0);
                    },

                    __startDrag(event) {
                        if (event.button !== undefined && event.button !== 0) return;
                        this.__pointerId = event.pointerId;
                        this.__dragStart = this.__axis === 'y' ? event.clientY : event.clientX;
                        this.__dragLast = this.__dragStart;
                        this.__dragLastTime = performance.now();
                        this.__dragging = true;
                        this.__dragStarted = false;
                        this.__movement = 0;
                    },

                    __moveDrag(event) {
                        if (! this.__dragging || event.pointerId !== this.__pointerId) return;
                        const position = this.__axis === 'y' ? event.clientY : event.clientX;
                        const delta = position - this.__dragStart;

                        if (! this.__dragStarted) {
                            if (Math.abs(delta) < 6) return;
                            if ((this.__dismissDistance(delta) <= 0 && this.__snapPoints.length === 0) || ! this.__canDrag(event.target, delta)) {
                                this.__dragging = false;
                                return;
                            }
                            this.__dragStarted = true;
                            this.__popup()?.setPointerCapture?.(event.pointerId);
                        }

                        event.preventDefault();
                        this.__movement = delta;
                        this.__dragLast = position;
                        this.__dragLastTime = performance.now();
                        this.__applyMovement(delta);
                    },

                    __endDrag(event) {
                        if (! this.__dragging || event.pointerId !== this.__pointerId) return;
                        const position = this.__axis === 'y' ? event.clientY : event.clientX;
                        const elapsed = Math.max(1, performance.now() - this.__dragLastTime);
                        const velocity = this.__dismissDistance(position - this.__dragLast) / elapsed;
                        const distance = this.__dismissDistance(this.__movement);
                        const popup = this.__popup();
                        const size = this.__axis === 'y' ? popup?.offsetHeight : popup?.offsetWidth;
                        const shouldClose = distance > Math.min(160, (size || 400) * 0.3) || velocity > 0.55;

                        this.__dragging = false;
                        this.__dragStarted = false;
                        this.__pointerId = null;
                        if (this.__snapPoints.length > 0 && this.__axis === 'y') {
                            const viewportSize = window.visualViewport?.height || window.innerHeight;
                            const points = this.__snapPoints.map((point) => snapPointPixels(point, viewportSize));
                            const current = points[this.__snapIndex];
                            const target = current - distance;

                            if ((target < points[0] * 0.65) || (velocity > 0.55 && this.__snapIndex === 0)) {
                                this.__setOpen(false);
                            } else {
                                let nextIndex = points.reduce((best, point, index) => (
                                    Math.abs(point - target) < Math.abs(points[best] - target) ? index : best
                                ), 0);

                                if (velocity > 0.55) nextIndex = Math.max(0, this.__snapIndex - 1);
                                if (velocity < -0.55) nextIndex = Math.min(points.length - 1, this.__snapIndex + 1);
                                this.__snapIndex = nextIndex;
                                this.__resetMovement();
                                this.__applySnapPoint();
                            }
                        } else if (shouldClose) this.__setOpen(false);
                        else this.__resetMovement();
                    },

                    __applyMovement(delta) {
                        const popup = this.__popup();
                        if (! popup) return;
                        popup.style.setProperty('--drawer-swipe-movement-x', this.__axis === 'x' ? `${delta}px` : '0px');
                        popup.style.setProperty('--drawer-swipe-movement-y', this.__axis === 'y' ? `${delta}px` : '0px');
                        this.__swipeProgress = Math.max(0, Math.min(1, this.__dismissDistance(delta) / Math.max(1, this.__axis === 'y' ? popup.offsetHeight : popup.offsetWidth)));
                        popup.style.setProperty('--drawer-swipe-progress', `${this.__swipeProgress}`);
                        popup.toggleAttribute('data-swiping', true);
                        if (this.__parentDrawerId) {
                            const parentPopup = document.querySelector(`[data-drawer-owner="${this.__parentDrawerId}"][data-slot="drawer-popup"]`);
                            parentPopup?.toggleAttribute('data-nested-drawer-swiping', true);
                            parentPopup?.style.setProperty('--drawer-swipe-progress', `${this.__swipeProgress}`);
                        }
                    },

                    __resetMovement() {
                        const popup = this.__popup();
                        if (! popup) return;
                        popup.style.setProperty('--drawer-swipe-movement-x', '0px');
                        popup.style.setProperty('--drawer-swipe-movement-y', '0px');
                        popup.style.setProperty('--drawer-swipe-progress', '0');
                        popup.removeAttribute('data-swiping');
                        this.__swipeProgress = 0;
                        if (this.__parentDrawerId) {
                            const parentPopup = document.querySelector(`[data-drawer-owner="${this.__parentDrawerId}"][data-slot="drawer-popup"]`);
                            parentPopup?.removeAttribute('data-nested-drawer-swiping');
                            parentPopup?.style.setProperty('--drawer-swipe-progress', '0');
                        }
                    },

                    __applySnapPoint() {
                        const popup = this.__popup();
                        if (! popup || this.__snapPoints.length === 0 || this.__axis !== 'y') return;
                        const viewportSize = window.visualViewport?.height || window.innerHeight;
                        const visible = Math.min(viewportSize, snapPointPixels(this.__snapPoints[this.__snapIndex], viewportSize));
                        const offset = Math.max(0, viewportSize - visible) * (this.__direction === 'down' ? 1 : -1);
                        popup.style.setProperty('--drawer-snap-point-offset', `${offset}px`);
                        popup.toggleAttribute('data-expanded', visible >= viewportSize - 1);
                    },

                    destroy() {
                        this.__optionsObserver?.disconnect();

                        if (this.__isScrollLocked) {
                            unlockBodyScroll();
                            this.__isScrollLocked = false;
                        }

                        this.__restoreBackground();
                        this.__resetMovement();
                    },
                };
            },
            'x-init'() {
                this.__syncOptions();
                this.__optionsObserver = new MutationObserver(() => this.__syncOptions());
                this.__optionsObserver.observe(el, {
                    attributes: true,
                    attributeFilter: ['data-swipe-direction', 'data-show-swipe-handle'],
                });
                this.__syncDrawer();
                this.$watch('__isOpen', () => this.__syncDrawer());
            },
            'x-modelable': '__isOpen',
            'x-bind:data-state'() { return this.__isOpen ? 'open' : 'closed'; },
            'x-bind:data-open'() { return this.__isOpen || null; },
            'x-bind:data-closed'() { return ! this.__isOpen || null; },
            'x-bind:data-drawer-owner'() { return this.__drawerId; },
        });
    });

    Alpine.directive('drawer-trigger', (el) => {
        Alpine.bind(el, {
            'x-init'() {
                this.__trigger = el;
            },
            'x-on:click'() { this.__setOpen(true); },
            'x-bind:aria-expanded'() { return this.__isOpen; },
            'x-bind:aria-controls'() { return this.__contentId; },
            'x-bind:data-state'() { return this.__isOpen ? 'open' : 'closed'; },
        });
    });

    Alpine.directive('drawer-overlay', (el) => {
        Alpine.bind(el, {
            'x-on:click.self'() { if (! this.__disablePointerDismissal) this.__setOpen(false); },
            'x-bind:data-state'() { return this.__isOpen ? 'open' : 'closed'; },
            'x-bind:data-snap-points'() { return this.__snapPoints.length ? '' : null; },
            'x-bind:data-drawer-owner'() { return this.__drawerId; },
            'x-bind:style'() { return `--drawer-swipe-progress:${this.__swipeProgress}`; },
        });
    });

    Alpine.directive('drawer-content', (el) => {
        Alpine.bind(el, {
            'x-init'() {
                this.__contentId = el.id || this.__contentId;
                el.id = this.__contentId;
                this.$nextTick(() => {
                    const title = el.querySelector('[data-slot="drawer-title"]');
                    const description = el.querySelector('[data-slot="drawer-description"]');
                    if (title) {
                        title.id ||= this.__titleId;
                        el.setAttribute('aria-labelledby', title.id);
                    }
                    if (description) {
                        description.id ||= this.__descriptionId;
                        el.setAttribute('aria-describedby', description.id);
                    }
                });
            },
            'x-show'() { return this.__isOpen; },
            'x-on:keydown'($event) {
                if ($event.key === 'Escape') {
                    $event.preventDefault();
                    this.__setOpen(false);
                    return;
                }
                this.__trapFocus($event);
            },
            'x-on:pointerdown'($event) { this.__startDrag($event); },
            'x-on:pointermove'($event) { this.__moveDrag($event); },
            'x-on:pointerup.window'($event) { this.__endDrag($event); },
            'x-on:pointercancel.window'($event) { this.__endDrag($event); },
            'x-bind:data-state'() { return this.__isOpen ? 'open' : 'closed'; },
            'x-bind:data-swipe-direction'() { return this.__direction; },
            'x-bind:data-swipe-axis'() { return this.__axis; },
            'x-bind:data-snap-points'() { return this.__snapPoints.length ? '' : null; },
            'x-bind:data-drawer-owner'() { return this.__drawerId; },
        });
    });

    Alpine.directive('drawer-close', (el) => {
        Alpine.bind(el, {
            'x-init'() { el.__drawerClose = () => this.__setOpen(false); },
            'x-on:click'() { el.__drawerClose(); },
        });
    });
};
