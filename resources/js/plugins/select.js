export default (Alpine) => {
    Alpine.directive('select', (el, { expression }) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __selectOpen: false,
                    __selectValue: expression,
                    __selectLabel: null,
                    __updateSelectLabel() {
                        this.__selectLabel = this.__selectValue
                            ? el.querySelector(`[data-value='${this.__selectValue}']`)?.innerHTML
                            : null;
                    },
                    __toggleSelectOverflow() {
                        document.body.style.paddingRight = this.__selectOpen
                            ? `${window.innerWidth - document.documentElement.clientWidth}px`
                            : '';
                        document.body.style.overflow = this.__selectOpen ? 'hidden' : '';
                    },
                };
            },
            'x-init'() {
                this.__updateSelectLabel();
                this.$watch('__selectValue', () => {
                    this.__updateSelectLabel();
                });

                this.__toggleSelectOverflow();
                this.$watch('__selectOpen', () => {
                    this.__toggleSelectOverflow();
                });
            },
            'x-modelable': '__selectValue',
        });
    });

    Alpine.directive('select-value', (el, { expression }) => {
        Alpine.bind(el, {
            'x-text'() {
                return this.__selectLabel || expression;
            },
        });
    });

    Alpine.directive('select-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-on:click'() {
                this.__selectOpen = ! this.__selectOpen;
                this.$refs.content.style.width=`${el.offsetWidth}px`
            },
            'x-bind:data-state'() {
                return this.__selectOpen ? 'open' : 'closed';
            },
            'x-bind:aria-expanded'() {
                return this.__selectOpen;
            },
            'x-bind:data-placeholder'() {
                return ! this.__selectValue;
            },
        });
    });

    Alpine.directive('select-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-ref': 'content',
            'x-show'() {
                return this.__selectOpen;
            },
            'x-on:click.outside'() {
                this.__selectOpen = false;
            },
            'x-bind:data-state'() {
                return this.__selectOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger'
        });
    });

    Alpine.directive('select-item', (el, { expression }) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__selectValue = expression;
                this.__selectOpen = false;
            },
            'x-bind:data-state'() {
                return this.__selectValue === expression ? 'checked' : 'unchecked';
            },
            'x-bind:aria-selected'() {
                return this.__selectValue === expression;
            },
        });
    });

    Alpine.directive('select-item-indicator', (el, { expression }) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__selectValue === expression;
            },
            'x-bind:data-state'() {
                return this.__selectValue === expression ? 'checked' : 'unchecked';
            },
        });
    });
}
