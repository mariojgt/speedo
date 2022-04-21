const mix = require("laravel-mix");
const path = require("path");

mix.webpackConfig({
    module: {
        rules: [
            // Add support for Vue ref sugar (let ref = $ref())
            {
                test: /\.vue$/,
                loader: "vue-loader",
                options: {
                    reactivityTransform: true,
                },
            },
            // Add support for <style lang="postcss"> blocks
            {
                test: /\.(postcss)$/,
                use: [
                    "vue-style-loader",
                    { loader: "css-loader", options: { importLoaders: 1 } },
                    "postcss-loader",
                ],
            },
        ],
    },
});

// /*
//  |--------------------------------------------------------------------------
//  | Mix Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Mix provides a clean, fluent API for defining some Webpack build steps
//  | for your Laravel application. By default, we are compiling the Sass
//  | file for the application as well as bundling up all the JS files.
//  |
//  */
// const basPath = path.resolve(__dirname, "/");

// // Vue js example
// mix.js(`src/resources/js/vue.js`, `public/speedo/js`)
//     .vue({ version: 3 })
//     .sourceMaps()
//     .version();

const tailwindcss = require("tailwindcss");

mix.sass(`src/resources/sass/app.scss`, `public/speedo/css`).options({
    processCssUrls: false,
    postCss: [tailwindcss("tailwind.config.js")],
});

// Complie the normal js
mix.js(`src/resources/js/app.js`, `public/speedo/js`).sourceMaps();
// Compile the vue js files
mix.js(`src/resources/js/vue.js`, `public/speedo/js`).sourceMaps().vue({ version: 3 });
