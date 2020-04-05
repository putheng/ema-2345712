const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss')
require('laravel-mix-alias');

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

mix.scripts([
    './resources/js/vendors/pace.min.js',
    './resources/js/vendors/perfect-scrollbar.min.js',
    './resources/js/vendors/stacked-menu.min.js',
    './resources/js/vendors/theme.min.js',
], 'public/js/plugin.js');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.sass('resources/sass/auth.scss', 'public/css');

// require('laravel-mix-purgecss');

// mix.postCss('resources/sass/home.css', 'public/css', [
//   tailwindcss('./tailwind.js'),
// ])
// .browserSync('tailwind-examples.test');
// .purgeCss();

// mix.sass('resources/sass/home/style.scss', 'public/css')
// .scripts([
// 	'./resources/js/vendors/home/jquery.min.js',
// 	'./resources/js/vendors/home/custom.js',
// 	'./resources/js/vendors/home/bootstrap.min.js',
// 	'./resources/js/vendors/home/bootstrap.bundle.min.js',
// ], 'public/js/script.js');

mix.alias({
    '@sass': '/resources/sass/',
    '@js': '/resources/js/',
});