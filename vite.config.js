import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                // You can add more entry points here if needed
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/assets', // Customize this if you need a different output directory
        rollupOptions: {
            input: {
                app: 'resources/js/app.js',
                // Add more inputs here if needed
            },
        },
    },
});
