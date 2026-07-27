export default (Alpine) => {
    Alpine.directive('input-group-addon', (el) => {
        Alpine.bind(el, {
            'x-on:click'(event) {
                if (! event.target.closest('button, a, [role="button"]')) {
                    el.parentElement.querySelector('input, textarea')?.focus();
                }
            },
        });
    });
};
