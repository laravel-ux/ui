export default (Alpine) => {
    Alpine.directive('otp-input', (el, {}, { evaluate }) => {
        const input = el.querySelector('input[data-slot="otp-input"]');

        Alpine.bind(el, {
            'x-data': function () {
                return {
                    __OtpInputActive: null,
                    __OtpInputValues: {},
                    __OtpInputLength: input.maxLength,
                    __OtpInputPattern: evaluate(input.pattern),
                    __OtpInputUpdate: function () {
                        input.value = Object.values(
                            Object.fromEntries(Object.entries(this.__OtpInputValues).sort(([a], [b]) => a - b))
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
                    .filter(item => this.__OtpInputPattern.test(item))
                    .splice(0, this.__OtpInputLength)
                    .forEach((value, index) => {
                        this.$refs[index].value = value;
                        this.$refs[index].blur();
                        this.__OtpInputValues[index] = value;
                    });

                this.__OtpInputUpdate();
            },
            'x-on:input.change': function () {
                if (el.value && el.value.match(this.__OtpInputPattern)) {
                    this.__OtpInputValues[this.__OtpInputActive] = el.value;
                    this.__OtpInputUpdate();

                    if (this.$refs[this.__OtpInputActive + 1]) {
                        this.$refs[this.__OtpInputActive + 1].focus()
                    }
                } else {
                    this.$refs[this.__OtpInputActive].value = '';
                }
            },
            'x-on:keydown.backspace': function () {
                if (! el.value) {
                    delete this.__OtpInputValues[this.__OtpInputActive];
                    this.__OtpInputUpdate();

                    if (this.$refs[this.__OtpInputActive - 1]) {
                        this.$refs[this.__OtpInputActive - 1].focus();
                    }
                }
            },
            'x-on:focus': function () {
                for (let i = 0; i < this.__OtpInputLength; i++) {
                    if (! this.__OtpInputValues[i] && index > i) {
                        this.$refs[i].focus();
                        this.__OtpInputActive = i;

                        return;
                    }
                }

                this.__OtpInputActive = index;
            },
            'x-on:blur': function () {
                this.__OtpInputActive = null
            },
            'x-bind:tabindex': function () {
                return this.__OtpInputActive === index ? 0 : -1;
            },
            'x-bind:data-active': function () {
                return this.__OtpInputActive === index;
            },
        });
    });
}
