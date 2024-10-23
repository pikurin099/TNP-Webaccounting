import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/gridjs.js',
                'resources/css/cashbook.css',
            ],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
                host: 'localhost'
            },
        watch: {
                usePolling: true
            }
    }
});
