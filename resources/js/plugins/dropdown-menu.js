export default (Alpine) => {
    Alpine.directive('dropdown-menu', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __dropdownMenuOpen: false,
                    __dropdownMenuSyncState() {
                        if (this.__dropdownMenuOpen) {
                            this.__dropdownMenuLockScroll();
                            this.__dropdownMenuSyncDimensions();
                        } else {
                            this.__dropdownMenuUnlockScroll();
                        }
                    },
                    __dropdownMenuLockScroll() {
                        document.body.style.setProperty(
                            'padding-right',
                            `${window.innerWidth - document.documentElement.clientWidth}px`,
                        );
                        document.body.style.setProperty('overflow', 'hidden');
                    },
                    __dropdownMenuUnlockScroll() {
                        document.body.style.removeProperty('padding-right');
                        document.body.style.removeProperty('overflow');
                    },
                    __dropdownMenuSyncDimensions() {
                        const rect = this.$refs.trigger.getBoundingClientRect();
                        this.$refs.content.style.setProperty(
                            '--dropdown-menu-trigger-width',
                            `${rect.width}px`,
                        );
                    },
                };
            },
            'x-init'() {
                this.__dropdownMenuSyncState();
                this.$watch('__dropdownMenuOpen', () => {
                    this.__dropdownMenuSyncState();
                });
            },
            'x-modelable': '__dropdownMenuOpen',
        });
    });

    Alpine.directive('dropdown-menu-close', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__dropdownMenuOpen = false;
            },
        });
    });

    Alpine.directive('dropdown-menu-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-on:click'() {
                this.__dropdownMenuOpen = ! this.__dropdownMenuOpen;
            },
            'x-bind:aria-expanded'() {
                return this.__dropdownMenuOpen;
            },
            'x-bind:data-state'() {
                return this.__dropdownMenuOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('dropdown-menu-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-ref': 'content',
            'x-show'() {
                return this.__dropdownMenuOpen;
            },
            'x-bind:data-state'() {
                return this.__dropdownMenuOpen ? 'open' : 'closed';
            },
            'x-on:click.outside'() {
                this.__dropdownMenuOpen = false;
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger'
        });
    });

    Alpine.directive('dropdown-menu-checkbox-item', (el, { expression }, { evaluate }) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __dropdownMenuCheckboxChecked: evaluate(expression),
                };
            },
            'x-modelable': '__dropdownMenuCheckboxChecked',
            'x-on:click'() {
                this.__dropdownMenuCheckboxChecked = ! this.__dropdownMenuCheckboxChecked;
            },
            'x-bind:aria-checked'() {
                return this.__dropdownMenuCheckboxChecked;
            },
        });
    });

    Alpine.directive('dropdown-menu-checkbox-item-indicator', (el) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__dropdownMenuCheckboxChecked;
            },
        });
    });

    Alpine.directive('dropdown-menu-radio-group', (el, { expression }) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __dropdownMenuRadioGroupValue: expression,
                };
            },
            'x-modelable': '__dropdownMenuRadioGroupValue',
        });
    });

    Alpine.directive('dropdown-menu-radio-group-item', (el, { expression }) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.__dropdownMenuRadioGroupValue = (
                    this.__dropdownMenuRadioGroupValue !== expression ? expression : ''
                );
            },
            'x-bind:aria-checked'() {
                return this.__dropdownMenuRadioGroupValue === expression;
            },
        });
    });

    Alpine.directive('dropdown-menu-radio-group-item-indicator', (el, { expression }) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__dropdownMenuRadioGroupValue === expression;
            },
        });
    });

    Alpine.directive('dropdown-menu-sub', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __dropdownMenuSubOpen: false,
                };
            },
            'x-modelable': '__dropdownMenuSubOpen',
        });
    });

    Alpine.directive('dropdown-menu-sub-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-on:mouseenter'() {
                this.__dropdownMenuSubOpen = true;
            },
            'x-on:mouseleave'() {
                this.__dropdownMenuSubOpen = false;
            },
            'x-bind:aria-expanded'() {
                return this.__dropdownMenuSubOpen;
            },
        });
    });

    Alpine.directive('dropdown-menu-sub-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-show'() {
                return this.__dropdownMenuSubOpen;
            },
            'x-on:mouseenter'() {
                this.__dropdownMenuSubOpen = true;
            },
            'x-on:mouseleave'() {
                this.__dropdownMenuSubOpen = false;
            },
            'x-bind:data-state'() {
                return this.__dropdownMenuSubOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger'
        });
    });
}
