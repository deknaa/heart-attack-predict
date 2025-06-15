import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/adminDashboardChart.js',
                'resources/js/articleTable.js',
                'resources/js/darkMode.js',
                'resources/js/floatingButtonBack.js',
                'resources/js/historyPredictionModal.js',
                'resources/js/navbar.js',
                'resources/js/termsCheckbox.js',
                'resources/js/userDashboardChart.js',
            ],
            refresh: true,
        }),
    ],
});
