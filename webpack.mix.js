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

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
    require('autoprefixer'),
]);

/*
 |--------------------------------------------------------------------------
 | Admin Panel — CSS Bundle
 | Concatenates all vendor + app CSS into a single file.
 | Run: npm run prod  (or npm run dev)
 |--------------------------------------------------------------------------
 */
mix.styles([
    'public/backend/vendors/bundle.css',
    'public/backend/vendors/dataTable/dataTables.min.css',
    'public/backend/vendors/clockpicker/bootstrap-clockpicker.min.css',
    'public/backend/vendors/datepicker/daterangepicker.css',
    'public/backend/vendors/slick/slick.css',
    'public/backend/vendors/slick/slick-theme.css',
    'public/backend/css/app.min.css',
], 'public/backend/css/admin.bundle.css');

/*
 |--------------------------------------------------------------------------
 | Admin Panel — JS Bundle
 | Concatenates all vendor + app JS into a single file.
 |--------------------------------------------------------------------------
 */
mix.scripts([
    'public/backend/vendors/bundle.js',
    'public/backend/vendors/dataTable/jquery.dataTables.min.js',
    'public/backend/vendors/dataTable/dataTables.responsive.min.js',
    'public/backend/vendors/dataTable/dataTables.bootstrap4.min.js',
    'public/backend/vendors/datepicker/daterangepicker.js',
    'public/backend/vendors/clockpicker/bootstrap-clockpicker.min.js',
    'public/backend/vendors/slick/slick.min.js',
    'public/backend/js/app.min.js',
], 'public/backend/js/admin.bundle.js');
