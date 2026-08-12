const normalizeDirection = (value) => value === 'rtl' ? 'rtl' : 'ltr';

export default (Alpine) => {
    Alpine.directive('direction', (el) => {
        const initialDirection = normalizeDirection(
            el.getAttribute('data-direction') || el.getAttribute('dir'),
        );

        Alpine.bind(el, {
            'x-data'() {
                return {
                    __direction: initialDirection,
                };
            },
            'x-modelable': '__direction',
            'x-bind:dir'() {
                return normalizeDirection(this.__direction);
            },
            'x-bind:data-direction'() {
                return normalizeDirection(this.__direction);
            },
        });
    });

    Alpine.directive('direction-portal', (el) => {
        const explicitDirection = el.getAttribute('dir');

        Alpine.bind(el, {
            'x-bind:dir'() {
                return normalizeDirection(
                    explicitDirection
                    || this.__direction
                    || document.documentElement.getAttribute('dir'),
                );
            },
        });
    });
};
