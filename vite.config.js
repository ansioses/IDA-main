import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/inicio.css',
                'resources/css/oferta.css',
                'resources/bootstrap/js/bootstrap.min.js',
                'resources/bootstrap/css/bootstrap.min.css',
                'resources/css/fontawesome-free/css/all.css',
                'resources/css/icheck-bootstrap/icheck-bootstrap.min.css',

            ],
            refresh: true,
        }),
    ],
});
