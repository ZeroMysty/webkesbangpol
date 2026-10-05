import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    // server: {
    //     host: '0.0.0.0',
    //     hmr: {
    //         host: '192.168.0.102', // IP laptop di jaringan WiFi
    //     }
    // },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/home.css', 
                'resources/css/landingpage-profile.css', 
                'resources/js/app.js',
                'resources/js/dashboard.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
