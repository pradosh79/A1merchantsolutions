import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

// NOTE: The current Bootstrap-placeholder Blade views load Bootstrap 5 via
// CDN and do not use @vite() at all, so this build step is optional today.
// It's kept wired up so the future Figma frontend can drop in compiled
// CSS/JS (resources/css/app.css, resources/js/app.js) without any new setup.
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
