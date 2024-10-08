import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                'resources/css/bootstrap.css',
                'resources/js/app.js',
                'resources/js/bootstrap.bundle.js',
                'resources/js/echo.js'
            ],
            refresh: true,
        }),
    ],
});

