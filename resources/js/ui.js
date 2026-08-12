document.addEventListener(
    'alpine:init',
    () => {
        const plugins = import.meta.glob('./plugins/**/*.js', { eager: true })

        for (const path in plugins) {
            window.Alpine.plugin(plugins[path].default);
        }
    },
    { once: true },
);
