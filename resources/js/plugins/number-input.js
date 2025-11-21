export default (Alpine) => {
    Alpine.directive('number-input', (el) => {
        Alpine.bind(el, {
            'x-ref': 'input',
            'x-on:blur'() {
                el.value = el.value === ''
                    ? ''
                    : Math.min(Math.max(Number(el.value), Number(el.min || -Infinity)), Number(el.max || Infinity));
            },
            'x-on:input'() {
                el.value = el.value.replace(/(?!^-)\D/g, '')
            },
        });
    });

    Alpine.directive('number-input-decrement', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.$refs.input.value = Number(this.$refs.input.value) - Number(this.$refs.input.step || 1)
            },
        });
    });

    Alpine.directive('number-input-increment', (el) => {
        Alpine.bind(el, {
            'x-on:click'() {
                this.$refs.input.value = Number(this.$refs.input.value) + Number(this.$refs.input.step || 1)
            },
        });
    });
}
