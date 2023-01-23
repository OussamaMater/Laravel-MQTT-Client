import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/volt.css',
                'resources/js/app.js',
                'resources/js/volt.js'
            ],
            refresh: true,
        }),
    ],
});
