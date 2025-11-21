export default (Alpine) => {
    Alpine.directive('otp-input', (el, {}, { evaluate }) => {
        const input = el.querySelector('input[data-slot="otp-input"]');

        Alpine.bind(el, {
            'x-data'() {
                return {
                    __otpInputActive: null,
                    __otpInputValues: {},
                    __otpInputLength: input.maxLength,
                    __otpInputPattern: evaluate(input.pattern),
                    __updateOtpInput() {
                        input.value = Object.values(
                            Object.fromEntries(Object.entries(this.__otpInputValues).sort(([a], [b]) => a - b))
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
                    .filter(item => this.__otpInputPattern.test(item))
                    .splice(0, this.__otpInputLength)
                    .forEach((value, index) => {
                        this.$refs[index].value = value;
                        this.$refs[index].blur();
                        this.__otpInputValues[index] = value;
                    });

                this.__updateOtpInput();
            },
            'x-on:input.change'() {
                if (el.value && el.value.match(this.__otpInputPattern)) {
                    this.__otpInputValues[this.__otpInputActive] = el.value;
                    this.__updateOtpInput();

                    if (this.$refs[this.__otpInputActive + 1]) {
                        this.$refs[this.__otpInputActive + 1].focus()
                    }
                } else {
                    this.$refs[this.__otpInputActive].value = '';
                }
            },
            'x-on:keydown.backspace'() {
                if (! el.value) {
                    delete this.__otpInputValues[this.__otpInputActive];
                    this.__updateOtpInput();

                    if (this.$refs[this.__otpInputActive - 1]) {
                        this.$refs[this.__otpInputActive - 1].focus();
                    }
                }
            },
            'x-on:focus'() {
                for (let i = 0; i < this.__otpInputLength; i++) {
                    if (! this.__otpInputValues[i] && index > i) {
                        this.$refs[i].focus();
                        this.__otpInputActive = i;

                        return;
                    }
                }

                this.__otpInputActive = index;
            },
            'x-on:blur'() {
                this.__otpInputActive = null
            },
            'x-bind:tabindex'() {
                return this.__otpInputActive === index ? 0 : -1;
            },
            'x-bind:data-active'() {
                return this.__otpInputActive === index;
            },
        });
    });
}
