let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js') // aca se compilan los js tipo app.js de vue
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.js(['resources/assets/js/app.js'],'public/patient/js/patientapp.js');

mix.styles([
    'public/patient/css/font-awesome.min.css',
    'public/patient/css/simple-line-icons.min.css',
    'public/patient/css/style.css',
    'public/patient/css/dropzone.scss',
],  'public/patient/css/compiladopatient.css');
//     .scripts([
//         'resources/assets/js/app.js',
//         'public/patient/js/bootstrap.min.js',
//         'public/patient/js/Chart.min.js',
//         'public/patient/js/jquery.min.js',
//         'public/patient/js/pace.min.js',
//         'public/patient/js/popper.min.js',
//         'public/patient/js/template.min.js',
//         'public/patient/js/sweetalert2.all.js',

// ], 'public/patient/js/compiladopatient.js');
