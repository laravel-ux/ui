export default (Alpine) => {
    Alpine.directive('toggle', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                return {
                    __pressed: el.dataset.state === 'on',
                };
            },
            'x-modelable': '__pressed',
            'x-on:click'() {
                this.__pressed = ! this.__pressed;
            },
            'x-bind:data-state'() {
                return this.__pressed ? 'on' : 'off';
            },
            'x-bind:aria-pressed'() {
                return this.__pressed ? 'true' : 'false';
            },
        });
    });
}
