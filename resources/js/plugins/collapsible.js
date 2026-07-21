export default (Alpine) => {
    let nextId = 0;

    Alpine.directive('collapsible', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                const id = el.id || `collapsible-${++nextId}`;

                return {
                    __isOpen: el.dataset.state === 'open',
                    __collapsibleTriggerId: el.querySelector('[data-slot="collapsible-trigger"]')?.id || `${id}-trigger`,
                    __collapsibleContentId: el.querySelector('[data-slot="collapsible-content"]')?.id || `${id}-content`,
                    __collapsibleDisabled: el.hasAttribute('data-disabled'),
                };
            },
            'x-modelable': '__isOpen',
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
            'x-bind:data-open'() {
                return this.__isOpen ? '' : null;
            },
            'x-bind:data-closed'() {
                return this.__isOpen ? null : '';
            },
        });
    });

    Alpine.directive('collapsible-trigger', (el) => {
        Alpine.bind(el, {
            'x-init'() {
                if (! el.id) {
                    el.id = this.__collapsibleTriggerId;
                }
            },
            'x-on:click'() {
                if (! this.__collapsibleDisabled && ! el.disabled) {
                    this.__isOpen = ! this.__isOpen;
                }
            },
            'x-bind:aria-expanded'() {
                return this.__isOpen;
            },
            'x-bind:aria-controls'() {
                return this.__collapsibleContentId;
            },
            'x-bind:aria-disabled'() {
                return this.__collapsibleDisabled || el.disabled || null;
            },
            'x-bind:disabled'() {
                return el.matches('button, input') && this.__collapsibleDisabled
                    ? true
                    : null;
            },
            'x-bind:data-panel-open'() {
                return this.__isOpen ? '' : null;
            },
        });
    });

    Alpine.directive('collapsible-content', (el) => {
        Alpine.bind(el, {
            'x-init'() {
                if (! el.id) {
                    el.id = this.__collapsibleContentId;
                }
            },
            'x-collapse': '',
            'x-show'() {
                return this.__isOpen;
            },
            'x-bind:data-state'() {
                return this.__isOpen ? 'open' : 'closed';
            },
            'x-bind:data-open'() {
                return this.__isOpen ? '' : null;
            },
            'x-bind:data-closed'() {
                return this.__isOpen ? null : '';
            },
            'x-bind:aria-labelledby'() {
                return this.__collapsibleTriggerId;
            },
        });
    });
}
