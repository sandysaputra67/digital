const mix = require('laravel-mix');
const fs = require('fs');

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

let outputPath = 'public/assets';

if (mix.inProduction()) {
    outputPath = 'resources/assets/dist';
    mix.setPublicPath('resources/assets/dist');
}

if (!mix.inProduction()) {
    mix.disableNotifications();
}

mix.js('resources/assets/src/js/app.js', `${outputPath}/js`).extract([
    'vue',
    'axios',
    'lodash'
]);

mix.sass('resources/assets/src/sass/app.scss', `${outputPath}/css`);

mix.postCss('resources/assets/src/css/tailwind.css', `${outputPath}/css`, [
    require("tailwindcss"),
]);

/**
 * Build themes
 */
let themesSrcDir = 'resources/assets/src/themes';
let themesOutputDir = outputPath;

fs.readdirSync(themesSrcDir).forEach(file => {
    mix.sass(`${themesSrcDir}/${file}`, `${outputPath}/themes`);
});
