export default (Alpine) => {
    Alpine.directive('avatar-image', (el) => {
        Alpine.bind(el, () => ({
            'x-data': function () {
                return {
                    __avatarError: false,
                };
            },
            'x-init': function () {
                // Reset error on mount for SPA navigation
                const src = el.getAttribute('src');

                if (src) {
                    el.src = src;
                }
            },
            'x-show': function () {
                return ! this.__avatarError;
            },
            'x-on:error': function () {
                this.__avatarError = true;
            },
        }));
    });
}
