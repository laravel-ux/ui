export default (Alpine) => {
    Alpine.directive('dropdown-menu', (el) => {
        Alpine.bind(el, {
            'x-data': function () {
                return {
                    __dropdownMenuOpen: false,
                };
            },
            'x-modelable': '__dropdownMenuOpen',
        });
    });

    Alpine.directive('dropdown-menu-close', (el) => {
        Alpine.bind(el, {
            'x-on:click': function () {
                this.__dropdownMenuOpen = false;
            },
        });
    });

    Alpine.directive('dropdown-menu-trigger', (el) => {
        Alpine.bind(el, {
            'x-ref': 'trigger',
            'x-on:click': function () {
                this.__dropdownMenuOpen = ! this.__dropdownMenuOpen;
            },
            'x-bind:aria-expanded': function () {
                return this.__dropdownMenuOpen;
            },
            'x-bind:data-state': function () {
                return this.__dropdownMenuOpen ? 'open' : 'closed';
            },
        });
    });

    Alpine.directive('dropdown-menu-checkbox-item', (el, { expression }) => {
        Alpine.bind(el, {
            'x-data': function () {
                return {
                    __dropdownMenuCheckboxChecked: expression,
                };
            },
            'x-modelable': '__dropdownMenuCheckboxChecked',
            'x-on:click': function () {
                this.__dropdownMenuCheckboxChecked = ! this.__dropdownMenuCheckboxChecked;
            },
            'x-bind:aria-checked': function () {
                return this.__dropdownMenuCheckboxChecked;
            },
        });
    });

    Alpine.directive('dropdown-menu-checkbox-item-indicator', (el) => {
        Alpine.bind(el, {
            'x-show': function () {
                return this.__dropdownMenuCheckboxChecked;
            },
        });
    });

    Alpine.directive('dropdown-menu-radio-group', (el, { expression }) => {
        Alpine.bind(el, {
            'x-data': function () {
                return {
                    __dropdownMenuRadioGroupValue: expression,
                };
            },
            'x-modelable': '__dropdownMenuRadioGroupValue',
        });
    });

    Alpine.directive('dropdown-menu-radio-group-item', (el, { expression }) => {
        Alpine.bind(el, {
            'x-on:click': function () {
                this.__dropdownMenuRadioGroupValue = (
                    this.__dropdownMenuRadioGroupValue !== expression ? expression : ''
                );
            },
            'x-bind:aria-checked': function () {
                return this.__dropdownMenuRadioGroupValue === expression;
            },
        });
    });

    Alpine.directive('dropdown-menu-radio-group-item-indicator', (el, { expression }) => {
        Alpine.bind(el, {
            'x-show': function () {
                return this.__dropdownMenuRadioGroupValue === expression;
            },
        });
    });

    Alpine.directive('dropdown-menu-sub', (el) => {
        Alpine.bind(el, {
            'x-data': function () {
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
            'x-on:mouseenter': function () {
                this.__dropdownMenuSubOpen = true;
            },
            'x-on:mouseleave': function () {
                this.__dropdownMenuSubOpen = false;
            },
            'x-bind:aria-expanded': function () {
                return this.__dropdownMenuSubOpen;
            },
        });
    });

    Alpine.directive('dropdown-menu-sub-content', (el, { modifiers }) => {
        Alpine.bind(el, {
            'x-show': function () {
                return this.__dropdownMenuSubOpen;
            },
            'x-on:mouseenter': function () {
                this.__dropdownMenuSubOpen = true;
            },
            'x-on:mouseleave': function () {
                this.__dropdownMenuSubOpen = false;
            },
            'x-bind:data-state': function () {
                return this.__dropdownMenuSubOpen ? 'open' : 'closed';
            },
            [['x-anchor', ...modifiers].join('.')]: '$refs.trigger'
        });
    });
}
