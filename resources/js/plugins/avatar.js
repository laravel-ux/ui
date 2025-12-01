export default (Alpine) => {
    Alpine.directive('avatar', (el) => {
        Alpine.bind(el, () => ({
            'x-data'() {
                return {
                    __hasError: false,
                };
            },
        }));
    });

    Alpine.directive('avatar-image', (el) => {
        Alpine.bind(el, () => ({
            'x-on:error'() {
                this.__hasError = true;
            },
        }));
    });
}
