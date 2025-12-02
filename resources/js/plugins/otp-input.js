export default (Alpine) => {
    Alpine.directive('otp-input', (el, {}, { evaluate }) => {
        const input = el.querySelector('input[data-slot="otp-input"]');

        Alpine.bind(el, {
            'x-data'() {
                return {
                    __active: null,
                    __values: {},
                    __length: input.maxLength,
                    __pattern: evaluate(input.pattern),
                    __update() {
                        input.value = Object.values(
                            Object.fromEntries(Object.entries(this.__values).sort(([a], [b]) => a - b))
                        ).join('');
                    },
                };
            },
        });
    });

    Alpine.directive('otp-input-slot', (el, { expression }, { evaluate }) => {
        const index = evaluate(expression);

        Alpine.bind(el, {
            'x-ref': index,
            'x-on:paste': function (e) {
                e.clipboardData.getData('text/plain')
                    .trim()
                    .split('')
                    .filter(item => this.__pattern.test(item))
                    .splice(0, this.__length)
                    .forEach((value, index) => {
                        this.$refs[index].value = value;
                        this.$refs[index].blur();
                        this.__values[index] = value;
                    });

                this.__update();
            },
            'x-on:input.change'() {
                if (el.value && el.value.match(this.__pattern)) {
                    this.__values[this.__active] = el.value;
                    this.__update();

                    if (this.$refs[this.__active + 1]) {
                        this.$refs[this.__active + 1].focus()
                    }
                } else {
                    this.$refs[this.__active].value = '';
                }
            },
            'x-on:keydown.backspace'() {
                if (! el.value) {
                    delete this.__values[this.__active];
                    this.__update();

                    if (this.$refs[this.__active - 1]) {
                        this.$refs[this.__active - 1].focus();
                    }
                }
            },
            'x-on:focus'() {
                for (let i = 0; i < this.__length; i++) {
                    if (! this.__values[i] && index > i) {
                        this.$refs[i].focus();
                        this.__active = i;

                        return;
                    }
                }

                this.__active = index;
            },
            'x-on:blur'() {
                this.__active = null
            },
            'x-bind:tabindex'() {
                return this.__active === index ? 0 : -1;
            },
            'x-bind:data-active'() {
                return this.__active === index;
            },
        });
    });
}
