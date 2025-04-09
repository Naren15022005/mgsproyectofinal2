import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react'; // Plugin de React

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app-react.js', // Punto de entrada de React
            ],
            refresh: true,
        }),
        react(), // Usa el plugin de React
    ],
});