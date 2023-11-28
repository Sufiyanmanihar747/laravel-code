import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/passwordEye.css',
                'resources/js/eye.js',
            ],
            refresh: true,
        }),
    ],

    build:{
        outDir: 'public/assets',

        rollupOptions: {
          output: {
            assetFileNames: (assetInfo) => {
              if (assetInfo.name == 'eye.js')
                return 'eye.js';
              return assetInfo.name;
            },
          }
        }
  }
});
