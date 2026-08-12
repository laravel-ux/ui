const numberAttribute = (el, name, fallback) => {
    const value = Number(el.dataset[name]);

    return Number.isFinite(value) ? value : fallback;
};

export default (Alpine) => {
    Alpine.directive('message-scroller-provider', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __messageScrollerRoot: null,
                    __messageScrollerViewport: null,
                    __messageScrollerContent: null,
                    __messageScrollerObserver: null,
                    __messageScrollerResizeObserver: null,
                    __messageScrollerScrollTimer: null,
                    __messageScrollerInitialized: false,
                    __messageScrollerFollowing: false,
                    __messageScrollerAutoScrolling: false,
                    __messageScrollerPreviousHeight: 0,
                    __messageScrollerPreviousFirstId: null,
                    __messageScrollerVisibility: '',
                    __messageScrollerScrollable: '',
                    __messageScrollerConfig: {
                        autoScroll: el.dataset.autoScroll === 'true',
                        defaultPosition: el.dataset.defaultScrollPosition || 'end',
                        edgeThreshold: numberAttribute(el, 'scrollEdgeThreshold', 8),
                        margin: numberAttribute(el, 'scrollMargin', 0),
                        previousPeek: numberAttribute(el, 'scrollPreviousItemPeek', 64),
                    },
                    __messageScrollerItems() {
                        return Array.from(this.__messageScrollerContent?.querySelectorAll(':scope > [data-slot="message-scroller-item"]') ?? []);
                    },
                    __messageScrollerEndOffset() {
                        const viewport = this.__messageScrollerViewport;
                        const lastItem = this.__messageScrollerItems().at(-1);
                        if (! viewport || ! lastItem) return 0;

                        return Math.max(
                            lastItem.offsetTop + lastItem.offsetHeight + this.__messageScrollerConfig.margin - viewport.clientHeight,
                            0,
                        );
                    },
                    __messageScrollerAtEnd() {
                        const viewport = this.__messageScrollerViewport;
                        if (! viewport) return true;

                        return this.__messageScrollerEndOffset() - viewport.scrollTop <= this.__messageScrollerConfig.edgeThreshold;
                    },
                    __messageScrollerSetState() {
                        const viewport = this.__messageScrollerViewport;
                        if (! viewport) return;

                        const start = viewport.scrollTop > this.__messageScrollerConfig.edgeThreshold;
                        const end = ! this.__messageScrollerAtEnd();
                        const value = [start && 'start', end && 'end'].filter(Boolean).join(' ');

                        [this.__messageScrollerRoot, viewport].forEach(target => {
                            if (! target) return;
                            if (value) target.dataset.scrollable = value;
                            else delete target.dataset.scrollable;
                            target.toggleAttribute('data-autoscrolling', this.__messageScrollerAutoScrolling);
                        });

                        el.querySelectorAll('[data-slot="message-scroller-button"]').forEach(button => {
                            const active = button.dataset.direction === 'start' ? start : end;
                            button.dataset.active = String(active);
                            button.toggleAttribute('inert', ! active);
                            button.tabIndex = active ? 0 : -1;
                        });

                        if (value !== this.__messageScrollerScrollable) {
                            this.__messageScrollerScrollable = value;
                            el.dispatchEvent(new CustomEvent('message-scroller:scrollable-change', {
                                bubbles: true,
                                detail: { start, end, value },
                            }));
                        }

                        this.__messageScrollerUpdateVisibility();
                    },
                    __messageScrollerUpdateVisibility() {
                        const viewport = this.__messageScrollerViewport;
                        if (! viewport) return;
                        const viewportRect = viewport.getBoundingClientRect();
                        const items = this.__messageScrollerItems();
                        const visibleMessageIds = items
                            .filter(item => {
                                const rect = item.getBoundingClientRect();
                                return rect.bottom > viewportRect.top && rect.top < viewportRect.bottom;
                            })
                            .map(item => item.dataset.messageId)
                            .filter(Boolean);
                        const currentAnchorId = items
                            .filter(item => item.dataset.scrollAnchor === 'true' && item.offsetTop <= viewport.scrollTop + this.__messageScrollerConfig.margin + 1)
                            .at(-1)?.dataset.messageId ?? null;
                        const serialized = JSON.stringify([currentAnchorId, visibleMessageIds]);

                        if (serialized === this.__messageScrollerVisibility) return;
                        this.__messageScrollerVisibility = serialized;
                        [this.__messageScrollerRoot, viewport].forEach(target => {
                            if (! target) return;
                            if (currentAnchorId) target.dataset.currentAnchorId = currentAnchorId;
                            else delete target.dataset.currentAnchorId;
                        });
                        el.dispatchEvent(new CustomEvent('message-scroller:visibility-change', {
                            bubbles: true,
                            detail: { currentAnchorId, visibleMessageIds },
                        }));
                    },
                    __messageScrollerScrollToEdge(direction, behavior = 'auto') {
                        const viewport = this.__messageScrollerViewport;
                        if (! viewport) return false;

                        if (behavior === 'smooth' && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                            behavior = 'auto';
                        }

                        window.clearTimeout(this.__messageScrollerScrollTimer);
                        this.__messageScrollerFollowing = direction === 'end' && this.__messageScrollerConfig.autoScroll;
                        this.__messageScrollerAutoScrolling = behavior === 'smooth';
                        viewport.scrollTo({ top: direction === 'start' ? 0 : this.__messageScrollerEndOffset(), behavior });
                        this.__messageScrollerSetState();

                        if (behavior === 'smooth') {
                            this.__messageScrollerScrollTimer = window.setTimeout(() => {
                                this.__messageScrollerAutoScrolling = false;
                                this.__messageScrollerSetState();
                            }, 350);
                        }

                        return true;
                    },
                    __messageScrollerScrollToMessage(messageId, options = {}) {
                        const viewport = this.__messageScrollerViewport;
                        const item = this.__messageScrollerItems().find(candidate => candidate.dataset.messageId === String(messageId));
                        if (! viewport || ! item) return false;

                        const align = options.align || 'start';
                        const margin = Number(options.scrollMargin ?? this.__messageScrollerConfig.margin);
                        const itemTop = item.offsetTop;
                        const positions = {
                            center: itemTop - (viewport.clientHeight - item.offsetHeight) / 2,
                            end: itemTop - viewport.clientHeight + item.offsetHeight + margin,
                            nearest: itemTop < viewport.scrollTop ? itemTop - margin : itemTop - viewport.clientHeight + item.offsetHeight + margin,
                            start: itemTop - margin,
                        };

                        this.__messageScrollerFollowing = false;
                        viewport.scrollTo({ top: positions[align] ?? positions.start, behavior: options.behavior || 'auto' });
                        return true;
                    },
                    __messageScrollerUpdateSpacer(anchor = null) {
                        const viewport = this.__messageScrollerViewport;
                        const content = this.__messageScrollerContent;
                        const spacer = content?.querySelector('[data-slot="message-scroller-spacer"]');
                        if (! viewport || ! content || ! spacer) return;

                        if (! anchor) {
                            spacer.style.height = '0px';
                            return;
                        }

                        spacer.style.height = '0px';
                        const contentAfterAnchor = content.scrollHeight - anchor.offsetTop;
                        spacer.style.height = `${Math.max(viewport.clientHeight - contentAfterAnchor - this.__messageScrollerConfig.margin, 0)}px`;
                    },
                    __messageScrollerInitialize() {
                        if (this.__messageScrollerInitialized || ! this.__messageScrollerViewport || ! this.__messageScrollerContent) return;
                        const items = this.__messageScrollerItems();
                        if (! items.length) return;

                        this.__messageScrollerInitialized = true;
                        if (this.__messageScrollerConfig.defaultPosition === 'start') {
                            this.__messageScrollerScrollToEdge('start');
                        } else if (this.__messageScrollerConfig.defaultPosition === 'last-anchor') {
                            const anchor = items.filter(item => item.dataset.scrollAnchor === 'true').at(-1);
                            if (anchor) {
                                this.__messageScrollerViewport.scrollTop = Math.max(
                                    anchor.offsetTop - this.__messageScrollerConfig.margin,
                                    0,
                                );
                            }
                            else this.__messageScrollerScrollToEdge('end');
                        } else {
                            this.__messageScrollerScrollToEdge('end');
                        }
                        this.__messageScrollerFollowing = this.__messageScrollerConfig.autoScroll && this.__messageScrollerAtEnd();
                        this.__messageScrollerPreviousHeight = this.__messageScrollerViewport.scrollHeight;
                        this.__messageScrollerPreviousFirstId = items[0]?.dataset.messageId ?? null;
                        this.__messageScrollerLastAnchor = items.filter(item => item.dataset.scrollAnchor === 'true').at(-1) ?? null;
                    },
                    __messageScrollerContentChanged() {
                        const viewport = this.__messageScrollerViewport;
                        if (! viewport) return;
                        this.__messageScrollerConfig.previousPeek = numberAttribute(el, 'scrollPreviousItemPeek', 64);
                        this.__messageScrollerConfig.margin = numberAttribute(el, 'scrollMargin', 0);
                        const items = this.__messageScrollerItems();
                        const firstId = items[0]?.dataset.messageId ?? null;
                        const height = viewport.scrollHeight;
                        const prepended = this.__messageScrollerPreviousFirstId && firstId !== this.__messageScrollerPreviousFirstId;

                        if (prepended && viewport.dataset.preserveScrollOnPrepend === 'true') {
                            viewport.scrollTop += height - this.__messageScrollerPreviousHeight;
                        } else {
                            const addedAnchor = items.filter(item => item.dataset.scrollAnchor === 'true').at(-1);
                            if (addedAnchor && addedAnchor !== this.__messageScrollerLastAnchor) {
                                this.__messageScrollerLastAnchor = addedAnchor;
                                this.__messageScrollerUpdateSpacer(addedAnchor);
                                viewport.scrollTo({
                                    top: Math.max(addedAnchor.offsetTop - this.__messageScrollerConfig.previousPeek - this.__messageScrollerConfig.margin, 0),
                                    behavior: 'auto',
                                });
                            } else if (this.__messageScrollerFollowing) {
                                viewport.scrollTop = this.__messageScrollerEndOffset();
                            }
                        }

                        this.__messageScrollerPreviousHeight = viewport.scrollHeight;
                        this.__messageScrollerPreviousFirstId = firstId;
                        this.__messageScrollerInitialize();
                        this.__messageScrollerSetState();
                    },
                    destroy() {
                        window.clearTimeout(this.__messageScrollerScrollTimer);
                        this.__messageScrollerObserver?.disconnect();
                        this.__messageScrollerResizeObserver?.disconnect();
                    },
                };
            },
            'x-init'() {
                this.$nextTick(() => {
                    this.__messageScrollerRoot = el.querySelector('[data-slot="message-scroller"]');
                    this.__messageScrollerViewport = el.querySelector('[data-slot="message-scroller-viewport"]');
                    this.__messageScrollerContent = el.querySelector('[data-slot="message-scroller-content"]');
                    if (! this.__messageScrollerViewport || ! this.__messageScrollerContent) return;

                    this.__messageScrollerObserver = new MutationObserver(() => this.$nextTick(() => this.__messageScrollerContentChanged()));
                    this.__messageScrollerObserver.observe(this.__messageScrollerContent, { childList: true, subtree: true, characterData: true });
                    this.__messageScrollerResizeObserver = new ResizeObserver(() => this.__messageScrollerContentChanged());
                    this.__messageScrollerResizeObserver.observe(this.__messageScrollerContent);
                    this.__messageScrollerInitialize();
                    this.__messageScrollerSetState();
                });
            },
            'x-on:message-scroller:scroll-to-start.window'(event) {
                if (event.detail?.provider && event.detail.provider !== el.id) return;
                this.__messageScrollerScrollToEdge('start', event.detail?.behavior || 'auto');
            },
            'x-on:message-scroller:scroll-to-end.window'(event) {
                if (event.detail?.provider && event.detail.provider !== el.id) return;
                this.__messageScrollerScrollToEdge('end', event.detail?.behavior || 'auto');
            },
            'x-on:message-scroller:scroll-to-message.window'(event) {
                if (event.detail?.provider && event.detail.provider !== el.id) return;
                this.__messageScrollerScrollToMessage(event.detail?.messageId, event.detail || {});
            },
        });
    });

    Alpine.directive('message-scroller-viewport', (el) => {
        Alpine.bind(el, {
            'x-on:scroll.passive'() {
                if (! this.__messageScrollerAutoScrolling) {
                    this.__messageScrollerFollowing = this.__messageScrollerConfig.autoScroll && this.__messageScrollerAtEnd();
                }
                this.__messageScrollerSetState();
            },
        });
    });

    Alpine.directive('message-scroller-button', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__messageScrollerScrollToEdge(el.dataset.direction || 'end', el.dataset.behavior || 'smooth');
            },
        });
    });
};
