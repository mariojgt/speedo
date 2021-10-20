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
let dirBaseName = __dirname;

// Normal js files
mix.js(dirBaseName+'/src/resources/js/app.js', dirBaseName+'/public/speedo/js')
    .sourceMaps()
    .version();

// Vue js example
mix.js(dirBaseName+'/src/resources/js/vue.js', dirBaseName+'/public/speedo/js')
    .vue({version: 3})
    .sourceMaps()
    .version();

const tailwindcss = require('tailwindcss')

mix.sass(dirBaseName+'/src/resources/sass/app.scss', dirBaseName+'/public/speedo/css')
   .options({
      processCssUrls: false,
      postCss: [ tailwindcss('tailwind.config.js') ],
});
