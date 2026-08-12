const createPattern = (source) => {
    if (! source) {
        return null;
    }

    try {
        return new RegExp(`^(?:${source})$`, 'u');
    } catch {
        return null;
    }
};

export default (Alpine) => {
    Alpine.directive('input-otp-container', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __inputOtpPattern: null,
                    __inputOtpResizeObserver: null,
                    __inputOtpSanitize(value) {
                        return Array.from(value ?? '')
                            .filter(character => ! this.__inputOtpPattern || this.__inputOtpPattern.test(character))
                            .join('')
                            .slice(0, this.$refs.input.maxLength);
                    },
                    __inputOtpRender(value = this.$refs.input.value) {
                        const input = this.$refs.input;
                        const sanitized = this.__inputOtpSanitize(value);

                        if (input.value !== sanitized) {
                            input.value = sanitized;
                        }

                        const selection = input === document.activeElement
                            ? Math.min(input.selectionStart ?? sanitized.length, input.maxLength - 1)
                            : -1;
                        const activeIndex = selection === input.maxLength
                            ? input.maxLength - 1
                            : selection;
                        const invalid = input.getAttribute('aria-invalid') === 'true';

                        this.__inputOtpSlots().forEach(slot => {
                            const index = Number(slot.dataset.index);
                            const active = input === document.activeElement && index === activeIndex;
                            const character = slot.querySelector('[data-slot="input-otp-slot-character"]');
                            const caret = slot.querySelector('[data-slot="input-otp-slot-caret"]');

                            slot.dataset.active = String(active);
                            if (invalid) {
                                slot.setAttribute('aria-invalid', 'true');
                            } else {
                                slot.removeAttribute('aria-invalid');
                            }
                            character.textContent = sanitized[index] ?? '';
                            caret?.classList.toggle('opacity-0', ! active || Boolean(sanitized[index]));
                        });
                    },
                    __inputOtpSlots() {
                        return el.querySelectorAll('[data-slot="input-otp-slot"]');
                    },
                    __inputOtpFocus(index) {
                        const input = this.$refs.input;
                        const requested = index ?? Math.min(
                            input.value.length,
                            input.maxLength - 1,
                        );
                        const start = Math.min(
                            Math.max(requested, 0),
                            input.value.length,
                        );
                        const end = start < input.value.length ? start + 1 : start;

                        input.focus();
                        input.setSelectionRange(start, end, 'forward');
                        this.__inputOtpRender();
                    },
                    destroy() {
                        this.__inputOtpResizeObserver?.disconnect();
                    },
                };
            },
            'x-init'() {
                this.$nextTick(() => {
                    const input = this.$refs.input;
                    const updateHeight = () => el.style.setProperty(
                        '--input-otp-container-height',
                        `${el.getBoundingClientRect().height}px`,
                    );

                    this.__inputOtpPattern = createPattern(input.dataset.pattern);
                    this.__inputOtpResizeObserver = new ResizeObserver(updateHeight);
                    this.__inputOtpResizeObserver.observe(el);
                    updateHeight();
                    this.__inputOtpRender(input.value);
                });
            },
            'x-on:click'(event) {
                const slot = Array.from(this.__inputOtpSlots()).find(candidate => {
                    const rect = candidate.getBoundingClientRect();

                    return event.clientX >= rect.left && event.clientX <= rect.right
                        && event.clientY >= rect.top && event.clientY <= rect.bottom;
                });

                this.__inputOtpFocus(slot ? Number(slot.dataset.index) : undefined);
            },
        });
    });

    Alpine.directive('input-otp', (el) => {
        Alpine.bind(el, {
            'x-ref': 'input',
            'x-on:input'() {
                const value = el.value;

                this.__inputOtpRender(el.value);

                if (el.value !== value) {
                    el.dispatchEvent(new Event('input', { bubbles: true }));
                }
            },
            'x-on:focus'() {
                this.__inputOtpRender();
            },
            'x-on:blur'() {
                this.__inputOtpRender();
            },
            'x-on:keyup'() {
                this.__inputOtpRender();
            },
            'x-on:select'() {
                this.__inputOtpRender();
            },
            'x-on:paste'(event) {
                event.preventDefault();
                el.value = this.__inputOtpSanitize(event.clipboardData?.getData('text/plain'));
                el.setSelectionRange(el.value.length, el.value.length);
                el.dispatchEvent(new Event('input', { bubbles: true }));
            },
        });
    });
};
