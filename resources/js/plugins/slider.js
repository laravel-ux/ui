const parseValues = (value, fallback) => {
    try {
        const parsed = JSON.parse(value || 'null');
        const values = Array.isArray(parsed) ? parsed : [parsed];
        const normalized = values.map(Number).filter(Number.isFinite);
        return normalized.length ? normalized : fallback;
    } catch {
        return fallback;
    }
};

const decimalPlaces = (number) => {
    const value = String(number);
    return value.includes('.') ? value.split('.')[1].length : 0;
};

export default (Alpine) => {
    Alpine.directive('slider', (el) => {
        Alpine.bind(el, {
            'x-data'() {
                const min = Number(el.dataset.min || 0);
                const max = Number(el.dataset.max || 100);
                const step = Math.max(Number(el.dataset.step || 1), Number.EPSILON);
                const orientation = el.dataset.orientation === 'vertical' ? 'vertical' : 'horizontal';
                const fallback = [min, max];

                return {
                    __values: parseValues(el.dataset.values, fallback),
                    __min: min,
                    __max: max,
                    __step: step,
                    __orientation: orientation,
                    __disabled: el.hasAttribute('data-disabled'),
                    __activeThumb: null,
                    __isRtl: false,

                    __sliderNormalize(value, index) {
                        const precision = Math.max(decimalPlaces(this.__step), decimalPlaces(this.__min));
                        const stepped = this.__min + Math.round((Number(value) - this.__min) / this.__step) * this.__step;
                        const previous = index > 0 ? this.__values[index - 1] : this.__min;
                        const next = index < this.__values.length - 1 ? this.__values[index + 1] : this.__max;
                        return Number(Math.min(next, Math.max(previous, stepped, this.__min), this.__max).toFixed(precision));
                    },

                    __sliderSetValue(index, value) {
                        if (this.__disabled) return;
                        const values = [...this.__values];
                        values[index] = this.__sliderNormalize(value, index);
                        this.__values = values;
                    },

                    __sliderPercent(value) {
                        return this.__max === this.__min ? 0 : (value - this.__min) / (this.__max - this.__min) * 100;
                    },

                    __sliderVisualPercent(value) {
                        const percent = this.__sliderPercent(value);
                        return this.__orientation === 'horizontal' && this.__isRtl ? 100 - percent : percent;
                    },

                    __sliderRangeStyle() {
                        const percents = this.__values.map((value) => this.__sliderVisualPercent(value));
                        const singleRtl = this.__values.length === 1 && this.__orientation === 'horizontal' && this.__isRtl;
                        const start = this.__values.length === 1 ? (singleRtl ? percents[0] : 0) : Math.min(...percents);
                        const end = this.__values.length === 1 && singleRtl ? 100 : Math.max(...percents);
                        if (this.__orientation === 'vertical') return `bottom:${start}%;height:${end - start}%`;
                        return `left:${start}%;width:${end - start}%`;
                    },

                    __sliderThumbStyle(value) {
                        const percent = this.__sliderVisualPercent(value);
                        if (this.__orientation === 'vertical') {
                            return `bottom:clamp(0.375rem,${percent}%,calc(100% - 0.375rem));left:50%;transform:translate(-50%,50%)`;
                        }
                        return `left:clamp(0.375rem,${percent}%,calc(100% - 0.375rem));top:50%;transform:translate(-50%,-50%)`;
                    },

                    __sliderValueFromPointer(event) {
                        const control = el.querySelector('[data-slot="slider-control"]');
                        const rect = control.getBoundingClientRect();
                        let ratio;
                        if (this.__orientation === 'vertical') ratio = (rect.bottom - event.clientY) / rect.height;
                        else {
                            ratio = (event.clientX - rect.left) / rect.width;
                            if (this.__isRtl) ratio = 1 - ratio;
                        }
                        return this.__min + Math.min(1, Math.max(0, ratio)) * (this.__max - this.__min);
                    },

                    __sliderNearestThumb(value) {
                        return this.__values.reduce((nearest, current, index) => (
                            Math.abs(current - value) < Math.abs(this.__values[nearest] - value) ? index : nearest
                        ), 0);
                    },

                    __sliderPointerDown(event, index = null) {
                        if (this.__disabled || (event.button !== undefined && event.button !== 0)) return;
                        event.preventDefault();
                        const value = this.__sliderValueFromPointer(event);
                        this.__activeThumb = index ?? this.__sliderNearestThumb(value);
                        this.__sliderSetValue(this.__activeThumb, value);
                        this.$nextTick(() => el.querySelectorAll('[data-slot="slider-thumb"]')[this.__activeThumb]?.focus());
                    },

                    __sliderPointerMove(event) {
                        if (this.__activeThumb === null) return;
                        event.preventDefault();
                        this.__sliderSetValue(this.__activeThumb, this.__sliderValueFromPointer(event));
                    },

                    __sliderPointerUp() {
                        this.__activeThumb = null;
                    },

                    __sliderKeydown(event, index) {
                        const horizontalDirection = this.__isRtl ? -1 : 1;
                        const changes = {
                            ArrowRight: this.__step * horizontalDirection,
                            ArrowLeft: -this.__step * horizontalDirection,
                            ArrowUp: this.__step,
                            ArrowDown: -this.__step,
                            PageUp: this.__step * 10,
                            PageDown: -this.__step * 10,
                        };
                        if (event.key === 'Home' || event.key === 'End') {
                            event.preventDefault();
                            this.__sliderSetValue(index, event.key === 'Home' ? this.__min : this.__max);
                        } else if (changes[event.key] !== undefined) {
                            event.preventDefault();
                            this.__sliderSetValue(index, this.__values[index] + changes[event.key]);
                        }
                    },

                    __sliderThumbLabel(index) {
                        const label = el.getAttribute('aria-label') || 'Slider';
                        if (this.__values.length === 1) return label;
                        if (this.__values.length === 2) return `${index === 0 ? 'Minimum' : 'Maximum'} ${label}`;
                        return `${label} ${index + 1}`;
                    },
                };
            },
            'x-init'() {
                this.__isRtl = getComputedStyle(el).direction === 'rtl';
                this.__values = this.__values
                    .map((value, index) => this.__sliderNormalize(value, index))
                    .sort((a, b) => a - b);
            },
            'x-modelable': '__values',
            'x-bind:data-dragging'() { return this.__activeThumb !== null || null; },
            'x-on:pointermove.window'($event) { this.__sliderPointerMove($event); },
            'x-on:pointerup.window'() { this.__sliderPointerUp(); },
            'x-on:pointercancel.window'() { this.__sliderPointerUp(); },
        });
    });
};
