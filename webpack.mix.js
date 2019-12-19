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
    .sass('resources/sass/app.scss', 'public/css');

mix.scripts([
    'resources/vanila/js/libs/jquery.js',
    'resources/vanila/js/libs/bootstrap.js',
    'resources/vanila/js/libs/bootstrap.min.js',
    'resources/vanila/js/libs/metisMenu.js',
    'resources/vanila/js/libs/sb-admin-2.js',
    'resources/vanila/js/libs/scripts.js'

], 'public/js/libs.js');


mix.styles([
    'resources/css/libs/bootstrap.css',
    'resources/css/libs/bootstrap.min.css',
    'resources/css/libs/blog-post.css',
    'resources/css/libs/font-awesome.css',
    'resources/css/libs/metisMenu.css',
    'resources/css/libs/sb-admin-2.css',
    'resources/css/libs/style.css',

], 'public/css/libs.css');

