import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                //'resources/css/app.css',
                'resources/css/passwordEye.css',
                'resources/css/profile.css',
                'resources/css/studentTable.css',
                // 'resources/css/datatables.min.css',
                'resources/js/eye.js',
                'resources/js/alerts.js',
                // 'resources/js/datatables.min.js',
            ],
            refresh: true,
          }),
        ],
        build: {
          outDir: 'public/assets',

          rollupOptions: {
            output: {
              entryFileNames: 'js/[name].js',
              chunkFileNames: 'js/[name].js',
              assetFileNames: 'css/[name].css',
            },
          },
        },
      });



      // css: {
      //   // Customize the CSS output filenames
      //   fileName: 'css/[name]-[hash].css',
      // },
