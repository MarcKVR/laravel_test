import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import postcss from './postcss.config.js';

const host = 'laravelpruebas.test';

export default defineConfig({
    server: {
        host,
        hmr: { host }
    },

    css: {
        postcss,
    },

    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: refreshPaths,
        }),
    ],
});
