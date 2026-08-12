let navigationMenuId = 0;

export default (Alpine) => {
    Alpine.directive('navigation-menu-item', (el) => {
        Alpine.bind(el, {
            'x-data'(){
                const id = `navigation-menu-${++navigationMenuId}`;

                return {
                    __isOpen: false,
                    __navigationMenuTriggerId: `${id}-trigger`,
                    __navigationMenuContentId: `${id}-content`,
                };
            },
            'x-modelable': '__isOpen',
            'x-on:navigation-menu-open.window'(event) {
                if (event.detail?.menu !== el.closest('[data-slot="navigation-menu"]')) return;
                if (event.detail?.item !== el) this.__isOpen = false;
            },
        });
    });

    Alpine.directive('navigation-menu-close', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__isOpen = false;
            },
        });
    });

    Alpine.directive('navigation-menu-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-init'() {
                this.__navigationMenuTriggerId = el.id || this.__navigationMenuTriggerId;
                el.id = this.__navigationMenuTriggerId;
            },
            'x-on:click'(){
                const willOpen = ! this.__isOpen;

                if (willOpen) {
                    window.dispatchEvent(new CustomEvent('navigation-menu-open', {
                        detail: {
                            item: el.closest('[data-slot="navigation-menu-item"]'),
                            menu: el.closest('[data-slot="navigation-menu"]'),
                        },
                    }));
                }

                this.__isOpen = willOpen;
            },
            'x-on:keydown.escape.stop'() {
                this.__isOpen = false;
                this.$nextTick(() => this.$refs.trigger?.focus());
            },
            'x-on:keydown.arrow-down.prevent'() {
                if (! this.__isOpen) this.$el.click();
                this.$nextTick(() => el.closest('[data-slot="navigation-menu-item"]')?.querySelector('[data-slot="navigation-menu-content"] a, [data-slot="navigation-menu-content"] button')?.focus());
            },
            'x-bind:aria-expanded'(){
                return this.__isOpen;
            },
            'x-bind:aria-controls'() {
                return this.__navigationMenuContentId;
            },
            'x-bind:data-state'(){
                return this.__isOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('navigation-menu-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-init'() {
                this.__navigationMenuContentId = el.id || this.__navigationMenuContentId;
                el.id = this.__navigationMenuContentId;
            },
            'x-show'(){
                return this.__isOpen;
            },
            'x-on:click.outside'(){
                this.__isOpen = false;
            },
            'x-on:keydown.escape.stop'() {
                this.__isOpen = false;
                this.$nextTick(() => this.$refs.trigger?.focus());
            },
            'x-bind:data-state'(){
                return this.__isOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger',
        });
    });
};
