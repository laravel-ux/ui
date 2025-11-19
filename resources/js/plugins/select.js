export default (Alpine) => {
    Alpine.directive('select', (el, { expression }) => {
        Alpine.bind(el, {
            'x-data': function () {
                return {
                    __selectOpen: false,
                    __selectValue: expression,
                    __selectLabel: null,
                    __selectUpdateLabel: function () {
                        this.__selectLabel = el.querySelector(`[data-value='${this.__selectValue}']`)?.innerHTML;
                    },
                    __selectToggleOverflow: function () {
                        document.body.style.paddingRight = this.__selectOpen
                            ? `${window.innerWidth - document.documentElement.clientWidth}px`
                            : '';
                        document.body.style.overflow = this.__selectOpen ? 'hidden' : '';
                    },
                };
            },
            'x-init': function () {
                if (this.__selectValue) {
                    this.__selectUpdateLabel();
                }

                this.$watch('__selectOpen', () => {
                    this.__selectToggleOverflow();
                });
                this.$watch('__selectValue', () => {
                    this.__selectUpdateLabel();
                });
            },
            'x-modelable': '__selectValue',
        });
    });

    Alpine.directive('select-value', (el, { expression }) => {
        Alpine.bind(el, {
            'x-text': function () {
                return this.__selectLabel || expression;
            },
        });
    });

    Alpine.directive('select-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-on:click': function () {
                this.__selectOpen = ! this.__selectOpen;
                this.$refs.content.style.width=`${el.offsetWidth}px`
            },
            'x-bind:data-state': function () {
                return this.__selectOpen ? 'open' : 'closed';
            },
            'x-bind:aria-expanded': function () {
                return this.__selectOpen;
            },
            'x-bind:data-placeholder': function () {
                return ! this.__selectValue;
            },
        });
    });

    Alpine.directive('select-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-ref': 'content',
            'x-show': function () {
                return this.__selectOpen;
            },
            'x-on:click.outside': function () {
                this.__selectOpen = false;
            },
            'x-bind:data-state': function () {
                return this.__selectOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger'
        });
    });

    Alpine.directive('select-item', (el, { expression }) => {
        Alpine.bind(el, {
            'x-on:click': function () {
                this.__selectValue = expression;
                this.__selectOpen = false;
            },
            'x-bind:data-state': function () {
                return this.__selectValue === expression ? 'checked' : 'unchecked';
            },
            'x-bind:aria-selected': function () {
                return this.__selectValue === expression;
            },
        });
    });

    Alpine.directive('select-item-indicator', (el, { expression }) => {
        Alpine.bind(el, {
            'x-show': function () {
                return this.__selectValue === expression;
            },
            'x-bind:data-state': function () {
                return this.__selectValue === expression ? 'checked' : 'unchecked';
            },
        });
    });
}
