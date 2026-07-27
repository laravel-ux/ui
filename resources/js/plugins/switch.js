export default (Alpine) => {
    Alpine.directive('switch', (el, directive, { cleanup }) => {
        const input = el.nextElementSibling?.matches('[data-switch-input]')
            ? el.nextElementSibling
            : null;
        const syncInput = (checked) => {
            if (input) {
                input.disabled = ! checked || el.disabled;
            }
        };

        if (input) {
            const observer = new MutationObserver(() => {
                syncInput(el.getAttribute('aria-checked') === 'true');
            });

            observer.observe(el, { attributes: true, attributeFilter: ['disabled'] });
            cleanup(() => observer.disconnect());
        }

        Alpine.bind(el, {
            'x-data'() {
                return {
                    __checked: el.dataset.state === 'checked',
                };
            },
            'x-init'() {
                syncInput(this.__checked);
                this.$watch('__checked', (checked) => syncInput(checked));
            },
            'x-modelable': '__checked',
            'x-on:click'() {
                this.__checked = ! this.__checked;
            },
            'x-bind:data-state'() {
                return this.__checked ? 'checked' : 'unchecked';
            },
            'x-bind:data-checked'() {
                return this.__checked ? '' : null;
            },
            'x-bind:aria-checked'() {
                return this.__checked;
            },
        });
    });

    Alpine.directive('switch-thumb', (el) => {
        Alpine.bind(el, {
            'x-bind:data-state'() {
                return this.__checked ? 'checked' : 'unchecked';
            },
        });
    });
}
