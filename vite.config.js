import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    optimizeDeps: {
        exclude: ['moment'],
        include: ['axios'],
    },
    server: {
        watch: {
            usePolling: false,
            ignored: ['**/storage/**', '**/node_modules/**'],
        },
    },
    cacheDir: 'node_modules/.vite',
});
