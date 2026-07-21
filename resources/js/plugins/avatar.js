export default (Alpine) => {
    Alpine.directive('avatar', (el) => {
        Alpine.bind(el, () => ({
            'x-data'() {
                return {
                    __avatarImageStatus: 'loading',
                };
            },
        }));
    });

    Alpine.directive('avatar-image', (el, directive, { cleanup }) => {
        const updateStatus = (status) => {
            Alpine.$data(el).__avatarImageStatus = status;
        };
        const observer = new MutationObserver((mutations) => {
            if (mutations.some((mutation) => mutation.attributeName === 'src')) {
                updateStatus('loading');

                if (el.complete) {
                    updateStatus(el.naturalWidth > 0 ? 'loaded' : 'error');
                }
            }
        });

        observer.observe(el, { attributes: true, attributeFilter: ['src'] });
        cleanup(() => observer.disconnect());

        Alpine.bind(el, () => ({
            'x-show'() {
                return this.__avatarImageStatus === 'loaded';
            },
            'x-init'() {
                if (el.complete) {
                    this.__avatarImageStatus = el.naturalWidth > 0 ? 'loaded' : 'error';
                }
            },
            'x-on:load'() {
                this.__avatarImageStatus = 'loaded';
            },
            'x-on:error'() {
                this.__avatarImageStatus = 'error';
            },
        }));
    });

    Alpine.directive('avatar-fallback', (el) => {
        Alpine.bind(el, () => ({
            'x-show'() {
                return this.__avatarImageStatus !== 'loaded';
            },
        }));
    });
}
