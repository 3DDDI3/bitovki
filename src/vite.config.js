import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';
import inject from "@rollup/plugin-inject";
import { defineConfig } from 'vite';
import fs from 'fs';


export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5174,
        https: {
            key: fs.readFileSync("/var/www/httpd-cert/www-root/butovki.spacetm.ru_le1.key"),
            cert: fs.readFileSync("/var/www/httpd-cert/www-root/butovki.spacetm.ru_le1.crtca"),
        },
        hmr: {
            host: "butovki.spacetm.ru",
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