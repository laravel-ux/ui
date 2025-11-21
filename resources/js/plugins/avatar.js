export default (Alpine) => {
    Alpine.directive('avatar-image', (el) => {
        Alpine.bind(el, () => ({
            'x-data'() {
                return {
                    __avatarError: false,
                };
            },
            'x-init'() {
                // Reset error on mount for SPA navigation
                const src = el.getAttribute('src');

                if (src) {
                    el.src = src;
                }
            },
            'x-show'() {
                return ! this.__avatarError;
            },
            'x-on:error'() {
                this.__avatarError = true;
            },
        }));
    });
}
