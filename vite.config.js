import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
// Open your Windows File Explorer and navigate into your project folder: C:\Users\marma\Desktop\mini-CRM-RH\

// Drill down into this specific folder: storage \ framework \ cache \

// Inside the cache folder, look for a file named config.php (or go into data/ if you see a data folder).

// Delete that file completely.