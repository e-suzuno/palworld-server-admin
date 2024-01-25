import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({

    build: {
        sourcemap: true, // ソースマップの生成をオンにする
    },
    server: {
        host: true,
        hmr: {
            host: 'localhost'
        },
    },

    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
