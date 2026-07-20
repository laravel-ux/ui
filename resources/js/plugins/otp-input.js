export default (Alpine) => {
    Alpine.directive('otp-input-container', (el, {}, { evaluate }) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __render(value) {
                        value = value
                            .split('')
                            .filter(v => ! this.$refs.input.pattern || evaluate(this.$refs.input.pattern).test(v))
                            .join('')
                            .slice(0, this.$refs.input.maxLength);

                        this.$refs.input.value = value;
                        const maxLength = this.$refs.input.maxLength;

                        this.__getSlots().forEach(slot => {
                            const index = evaluate(slot.dataset.index);
                            const active =
                                index === value.length ||
                                (value.length === maxLength && index === maxLength - 1);

                            slot.setAttribute('data-active', active);
                            slot.firstChild.nodeValue = value[index] || '';
                            slot.querySelector('[data-slot="otp-input-slot-caret"]')
                                ?.classList.toggle('opacity-0', ! active || value[index]);
                        });
                    },
                    __getSlot(index) {
                        return el.querySelector(`[data-slot="otp-input-slot"][data-index="${index}"]`);
                    },
                    __getSlots() {
                        return el.querySelectorAll('[data-slot="otp-input-slot"]');
                    },
                };
            },
            'x-init'() {
                this.$nextTick(() => {
                    el.style.setProperty(
                        '--otp-input-container-height',
                        `${el.getBoundingClientRect().height}px`,
                    );
                });
            },
            'x-on:click'() {
                this.$refs.input.focus();
                this.$refs.input.setSelectionRange(this.$refs.input.value.length, this.$refs.input.value.length);
            },
        });
    });

    Alpine.directive('otp-input', (el) => {
        Alpine.bind(el, {
            'x-ref': 'input',
            'x-on:input'() {
                this.__render(el.value);
            },
            'x-on:focus'() {
                const index = el.maxLength === el.value.length
                    ? el.maxLength - 1
                    : el.value.length;

                this.__getSlot(index)?.setAttribute('data-active', true);
                this.__getSlot(index)?.querySelector('[data-slot="otp-input-slot-caret"]')
                    ?.classList.remove('opacity-0');
            },
            'x-on:paste'(e) {
                this.__render(e.clipboardData.getData('text/plain'));
            },
            'x-on:blur'() {
                this.__getSlots().forEach(slot => {
                    slot.setAttribute('data-active', false);
                    slot.querySelector('[data-slot="otp-input-slot-caret"]')
                        ?.classList.add('opacity-0');
                });
            },
        });
    });
}
