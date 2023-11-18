import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: 
            [
            'resources/css/app.css', 
            'resources/js/app.js',
            'resources/css/studentTable.css',
            'resources/css/profile.css',
            ],
            refresh: true,
        }),
    ],
    build:{
        outDir: 'public/assets',

        rollupOptions: {
            output: {
              assetFileNames: (assetInfo) => {
                if (assetInfo.name == 'studentTable.css')
                  return 'index.css';
                if (assetInfo.name == 'profile.css')
                  return 'show.css';
                return assetInfo.name;
              },
            }
        }
    },
});
