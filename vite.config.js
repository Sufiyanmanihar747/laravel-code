import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/eye.js',
                'resources/css/passwordEye.css',
                'resources/js/jquery.js',
            ],
            refresh: true,
        }),
    ],
});
