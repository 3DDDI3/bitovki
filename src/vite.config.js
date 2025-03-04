import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';
import inject from "@rollup/plugin-inject";
import { defineConfig } from 'vite';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5174,
        hmr: {
            host: "localhost",
        },
    },
    optimizeDeps: {
        include: ["jquery"],
    },
    define: {
        'process.env': process.env
    },
    resolve: {
        alias: {
            "~@fontsource": resolve(__dirname, "node_modules/@fontsource"),
            'moment': resolve(__dirname, 'node_modules/moment/moment'),
            '~font': resolve(__dirname, 'resources/fonts'),
        },
    },
    plugins: [
        inject({
            $: 'jquery',
            jQuery: 'jquery',
        }),
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});