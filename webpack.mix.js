const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
 mix.copy('node_modules/sweetalert2/dist/sweetalert2.all.min.js',
 'public/assets/js/sweetalert2.all.min.js');
 mix.copy('node_modules/sweetalert2/dist/sweetalert2.css',
    'public/assets/css/sweetalert2.css');
 mix.copy('node_modules/izitoast/dist/css/iziToast.min.css',
    'public/assets/css/iziToast.min.css');
 mix.babel('node_modules/izitoast/dist/js/iziToast.min.js',
    'public/assets/js/iziToast.min.js');
mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/colleges/index.js','public/admins/js/colleges/index.js')
    .js('resources/js/students/index.js','public/admins/js/students/index.js')
    .js('resources/js/comman-settings/index.js','public/admins/js/comman-settings/index.js')
    .js('resources/js/custom/custom.js','public/js/custom.js')

    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
