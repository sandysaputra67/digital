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

mix.js('resources/assets/js/app.js', 'public/assets/js').extract(['vue']);

mix.sass('resources/assets/sass/app.scss', 'public/assets/css');

mix.postCss('resources/assets/css/tailwind.css', 'public/assets/css', [
    require("tailwindcss"),
]);

