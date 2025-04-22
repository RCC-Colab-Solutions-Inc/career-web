import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
    server: {
        host: '0.0.0.0', // 👈 This is required for external access
        port: 5173,
        strictPort: true,
        hmr: {
            host: '34.87.64.54', // 👈 Use your external IP address here
        },
        cors: {
            origin: 'http://34.87.64.54',  // Add this line to allow the frontend domain
            credentials: true, 
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
