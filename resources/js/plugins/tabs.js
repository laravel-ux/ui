let tabsId = 0;
const tabsIds = new WeakMap();

export default (Alpine) => {
    Alpine.directive('tabs', (el) => {
        tabsIds.set(el, `tabs-${++tabsId}`);

        Alpine.bind(el, {
            'x-data'() {
                return {
                    __value: el.dataset.value,
                    __tabsTriggers() {
                        return [...el.querySelectorAll('[data-slot="tabs-trigger"]')]
                            .filter((trigger) => trigger.closest('[data-slot="tabs"]') === el);
                    },
                    __tabsEnabledTriggers() {
                        return this.__tabsTriggers().filter((trigger) => ! trigger.disabled);
                    },
                    __tabsSelect(trigger, focus = false) {
                        if (! trigger || trigger.disabled) return;

                        this.__value = trigger.dataset.value;
                        if (focus) trigger.focus({ preventScroll: true });
                    },
                    __tabsMove(event, trigger) {
                        const triggers = this.__tabsEnabledTriggers();
                        const currentIndex = triggers.indexOf(trigger);

                        if (currentIndex === -1) return;

                        const orientation = el.dataset.orientation || 'horizontal';
                        const direction = getComputedStyle(el).direction;
                        const previousKey = orientation === 'vertical'
                            ? 'ArrowUp'
                            : direction === 'rtl' ? 'ArrowRight' : 'ArrowLeft';
                        const nextKey = orientation === 'vertical'
                            ? 'ArrowDown'
                            : direction === 'rtl' ? 'ArrowLeft' : 'ArrowRight';
                        let nextIndex = null;

                        if (event.key === previousKey) nextIndex = (currentIndex - 1 + triggers.length) % triggers.length;
                        if (event.key === nextKey) nextIndex = (currentIndex + 1) % triggers.length;
                        if (event.key === 'Home') nextIndex = 0;
                        if (event.key === 'End') nextIndex = triggers.length - 1;
                        if (nextIndex === null) return;

                        event.preventDefault();

                        const nextTrigger = triggers[nextIndex];

                        if (el.dataset.activationMode === 'manual') {
                            nextTrigger.focus({ preventScroll: true });
                            return;
                        }

                        this.__tabsSelect(nextTrigger, true);
                    },
                };
            },
            'x-modelable': '__value',
        });
    });

    Alpine.directive('tabs-trigger', (el) => {
        const tabs = el.closest('[data-slot="tabs"]');
        const value = el.dataset.value;
        const triggers = [...tabs.querySelectorAll('[data-slot="tabs-trigger"]')]
            .filter((trigger) => trigger.closest('[data-slot="tabs"]') === tabs);
        const contents = [...tabs.querySelectorAll('[data-slot="tabs-content"]')]
            .filter((content) => content.closest('[data-slot="tabs"]') === tabs);
        const index = triggers.indexOf(el);
        const content = contents.find((item) => item.dataset.value === value);

        const id = tabsIds.get(tabs);

        el.id ||= `${id}-trigger-${index + 1}`;
        if (content) {
            content.id ||= `${id}-content-${index + 1}`;
            el.setAttribute('aria-controls', content.id);
            content.setAttribute('aria-labelledby', el.id);
        }

        Alpine.bind(el, {
            'x-on:click'() {
                this.__tabsSelect(el);
            },
            'x-on:keydown'(event) {
                this.__tabsMove(event, el);
            },
            'x-bind:tabindex'() {
                const enabled = this.__tabsEnabledTriggers();
                const active = enabled.find((trigger) => trigger.dataset.value === this.__value);

                return el === (active || enabled[0]) ? 0 : -1;
            },
            'x-bind:data-state'() {
                return this.__value === value ? 'active' : 'inactive';
            },
            'x-bind:data-active'() {
                return this.__value === value ? '' : null;
            },
            'x-bind:aria-selected'() {
                return this.__value === value;
            },
        });
    });

    Alpine.directive('tabs-content', (el) => {
        const value = el.dataset.value;

        Alpine.bind(el, {
            'x-show'() {
                return this.__value === value;
            },
            'x-bind:data-state'() {
                return this.__value === value ? 'active' : 'inactive';
            },
            'x-bind:data-active'() {
                return this.__value === value ? '' : null;
            },
        });
    });
};
