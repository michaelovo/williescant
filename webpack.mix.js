const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/scripts.js', 'public/js')
    .js('resources/js/purchases.js', 'public/js')
    .js('resources/js/accountant.js', 'public/js')
    .js('resources/js/dropzone.js', 'public/js')
    .js('resources/js/sales.js', 'public/js')
    .js('resources/js/main.js', 'public/js')
    .js('resources/js/sidebar-nav.js', 'public/js')
    .js('resources/js/dashboard-page-scripts.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
