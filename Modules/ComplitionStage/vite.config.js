const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        outDir: '../../public/build-complitionstage',
        emptyOutDir: true,
        manifest: true,
    },
    plugins: [
        laravel({
            publicDirectory: '../../public',
            buildDirectory: 'build-complitionstage',
            input: [
                __dirname + '/Resources/room-assets/sass/app.scss',
                __dirname + '/Resources/room-assets/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
